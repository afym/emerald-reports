<?php

namespace Emerald\Pdf;

use Emerald\Pdf\Information;
use Emerald\Pdf\Page\Format;
use Emerald\Interfaces\Pdf\Element;
use Emerald\Assembly\Document\PageStack;
use Emerald\Assembly\Document\HeaderStack;
use Emerald\Assembly\Document\MainBuilder;
use Emerald\Document\Object;

class Document
{

    private $format;
    private $headerStack;
    private $pagesStack;
    private $mainBuilder;
    private $objectCounter;

    public function __construct(Format $format)
    {
        $this->format = $format;
        $this->objectCounter = 1;
        $this->mainBuilder = new MainBuilder();
        $this->initHeaderStack($format);
        $this->initPagesStack($format);
    }

    public function addPage()
    {
        $pageReference = $this->newObject();
        $this->pagesStack->appendPageReference($pageReference);
        $this->headerStack->appendPageReference($pageReference);
        $this->pagesStack->appendPageContent($this->newObject());
        return $this;
    }

    public function addElement(Element $element)
    {
        $this->pagesStack->appendElement($element);
        return $this;
    }

    public function setInformation(Information $information)
    {
        $this->headerStack->setInfo($information);
        return $this;
    }

    public function render()
    {
        $this->mainBuilder->setHeaderStack($this->headerStack);
        return $this->mainBuilder->build();
    }

    private function initHeaderStack(Format $format)
    {
        $this->headerStack = (new HeaderStack($format))
                ->setPage($this->newObject())
                ->setCatalog($this->newObject())
                ->setResource($this->newObject())
                ->setInformation($this->newObject());
    }

    private function initPagesStack(Format $format)
    {
        $this->pagesStack = (new PageStack($format))
                ->setParentReference($this->headerStack->getPage())
                ->setResourcesReference($this->headerStack->getResource());
    }

    private function newObject()
    {
        return new Object($this->objectCounter++);
    }

}