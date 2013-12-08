<?php

namespace Emerald\Assembly\Document;

use Emerald\Assembly\Document\PageStack;
use Emerald\Assembly\Document\Abstracts\Builder;
use Emerald\Assembly\Element\ElementFactory;
use Emerald\Type\Page;
use Emerald\Type\Length;

class PageBuilder extends Builder
{

    private $pageStack;
    private $page;
    private $length;

    public function __construct(PageStack $headerStack)
    {
        parent::__construct();
        ElementFactory::setFormat($headerStack->getFormat());
        $this->pageStack = $headerStack;
        $this->page = new Page();
        $this->length = new Length();
    }

    public function build()
    {
        $this->buildElements();
        return $this->out;
    }

    private function buildElements()
    {
        $pagesReference = $this->pageStack->getPagesReference();

        foreach ($pagesReference as $referenceKey => $pageReference) {
            $content = $this->getPageContent($referenceKey);
            $this->append($pageReference->setContent($this->getPageReferenceContent($content->getReference()))->out());
            $this->append($content->setContentType()->setContent($this->getPageContentCotent($this->getElements($content->getReference())))->out());
        }
    }

    private function getElements($contentKey)
    {
        $elements = $this->pageStack->getPagesElement();
        return $elements->offsetGet($contentKey);
    }

    private function getPageContent($referenceKey)
    {
        return $this->pageStack->getPagesContent()->offsetGet($referenceKey);
    }

    private function getPageReferenceContent($contentReference)
    {
        $this->page->setValue(array(
            'p' => $this->pageStack->getParentReference()->getReference(), 
            'r' => $this->pageStack->getResourcesReference()->getReference(), 
            'c' => $contentReference,
        ));
        
        return $this->page->out();
    }

    public function getPageContentCotent(\ArrayObject $elements)
    {
        $length = 0;
        $output = '';
        foreach ($elements as $element) {
            $elementOutput = ElementFactory::getOutput($element);
            $length += $this->getLengthElement($elementOutput);
            $output .= $elementOutput;
        }

        return $this->getContent($length, $output);
    }

    private function getLengthElement($elementOutput)
    {
        return strlen($elementOutput);
    }

    private function getContent($length, $output)
    {
        $this->length->setValue(array(
            'l' => $length,
        ));

        return "{$this->length->out()}\nstream\n$output\nendstream\n";
    }

}
