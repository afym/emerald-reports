<?php

namespace Emerald\Assembly\Document;

use Emerald\Document\Object;
use Emerald\Interfaces\Pdf\Element;
use Emerald\Assembly\Document\Abstracts\Stack;
use Emerald\Type\Page;

class PageStack extends Stack
{

    private $contentKey;
    private $pagesReference;
    private $pagesContent;
    private $pagesElements;
    private $parentReference;
    private $resourcesReference;
    private $pageType;

    public function __construct()
    {
        parent::__construct();

        $this->pagesReference = new \ArrayObject();
        $this->pagesContent = new \ArrayObject();
        $this->pagesElements = new \ArrayObject();
        $this->pageType = new Page();
    }

    public function setParentReference($reference)
    {
        $this->parentReference = $reference;

        return $this;
    }

    public function setResourcesReference($reference)
    {
        $this->resourcesReference = $reference;

        return $this;
    }

    public function appendPageReference(Object $reference)
    {
        $this->pagesReference->append($reference);

        return $this;
    }

    public function appendPageContent(Object $content)
    {
        $this->pagesContent->append($content);
        $this->contentKey = $content->getReference();
        $this->pagesElements->offsetSet($this->contentKey, new \ArrayObject());

        return $this;
    }

    public function appendElement(Element $element)
    {
        $this->pagesElements->offsetGet($this->contentKey)->append($element);

        return $this;
    }

    public function make()
    {
        $this->buildPages();

        return $this->out;
    }

    private function buildPages()
    {
        foreach ($this->pagesReference as $key => $reference) {
            $content = $this->pagesContent->offsetGet($key);
            $contentReference = $content->getReference();
            $reference->setContent($this->getPageReferenceContent($contentReference));
            $content->setContent($this->getPageContentContent($contentReference));

            $this->out .= "{$this->parse($reference->out())} {$this->parse($content->out())}";
        }
    }

    private function getPageContentContent($reference)
    {
        $elements = $this->pagesElements->offsetGet($reference);
        $out = '';

        foreach ($elements as $element) {
            $out .= $this->parse($element->out());
        }

        return "{$this->getLenght($out)} {$out}";
    }

    private function getPageReferenceContent($content)
    {
        $this->pageType->setValue(array(
            'p' => $this->parentReference,
            'r' => $this->resourcesReference,
            'c' => $content,
        ));

        return $this->pageType->out();
    }

}
