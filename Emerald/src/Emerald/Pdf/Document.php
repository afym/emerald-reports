<?php

namespace Emerald\Pdf;

use Emerald\Pdf\Information;
use Emerald\Pdf\Page\Format;
use Emerald\Interfaces\Pdf\Element;
use Emerald\Assembly\Document\HeaderStack;
use Emerald\Assembly\Document\PageStack;
use Emerald\Assembly\Resource\ResourceStack;
use Emerald\Assembly\Document\TrailerStack;
use Emerald\Assembly\Document\MainBuilder;
use Emerald\Document\Object;

class Document
{

    private $format;
    private $headerStack;
    private $pagesStack;
    private $resourceStack;
    private $trailerStack;
    private $mainBuilder;
    private $objectCounter;

    public function __construct(Format $format)
    {
        $this->format = $format;
        $this->objectCounter = 1;
        $this->mainBuilder = new MainBuilder();
        $this->initHeaderStack($format);
        $this->initPagesStack($format);
        $this->initResourceStack($format);
        $this->initTrailerStack($format);
    }

    public function addFont(Font $font)
    {
        $this->resourceStack->addFont($font);
        return $this;
    }

    public function getFontReference(Font $font)
    {
        $this->resourceStack->getFontReference($font);
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
                // add in header 
                // add in header
                // add in header
    }

    private function initPagesStack(Format $format)
    {
        $this->pagesStack = (new PageStack($format))
                ->setParentReference($this->headerStack->getPage())
                ->setResourcesReference($this->headerStack->getResource());
    }

    private function initResourceStack(Format $format)
    {
        $this->resourceStack = (new ResourceStack($format))
                ->setResourceReference($this->headerStack->getResource());
    }

    private function initTrailerStack(Format $format)
    {
        $this->trailerStack = (new TrailerStack($format))
             ->setSizeReference($this->headerStack->x()) // add in header
             ->setRootReference($this->headerStack->getPage()) // add in header
             -setInfoReference($this->headerStack->getInformation()); // add in header
    }

    private function newObject()
    {
        return new Object($this->objectCounter++);
    }

}
