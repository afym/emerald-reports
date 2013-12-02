<?php

namespace Emerald\Assembly\Document;

use Emerald\Assembly\Document\PageStack;
use Emerald\Assembly\Document\Abstracts\Builder;

class PageBuilder extends Builder
{

    private $pageStack;

    public function __construct(PageStack $headerStack)
    {
        parent::__construct();

        $this->pageStack = $headerStack;
    }

    public function build()
    {
        return $this->out;
    }

    private function buildElements()
    {
        $pagesReference = $this->pageStack->getPagesReference();

        foreach ($pagesReference as $referenceKey => $pageReference) {
            $content = $this->getPageContent($referenceKey);
            $elements = $this->getElements($content->getReference());

            foreach ($elements as $element) {
                
            }
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

}
