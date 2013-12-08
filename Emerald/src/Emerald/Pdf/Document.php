<?php

namespace Emerald\Pdf;

use Emerald\Pdf\Information;
use Emerald\Pdf\Page\Format;
use Emerald\Interfaces\Pdf\Element;
use Emerald\Pdf\Resources\Font;
use Emerald\Assembly\Document\ObjectStack;
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
    private $objectStack;
    private $objectCounter;

    public function __construct(Format $format)
    {
        $this->format = $format;
        $this->objectCounter = 1;
        $this->mainBuilder = new MainBuilder();
        $this->objectStack = new ObjectStack($format);
        $this->initHeaderStack($format);
        $this->initTrailerStack($format);
        $this->initPagesStack($format);
        $this->initResourceStack($format);
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
        $this->mainBuilder->setPageStack($this->pagesStack);
        $this->mainBuilder->setTrailerStack($this->trailerStack->setObjects($this->objectStack->getObjects()));
        $this->mainBuilder->setResourceStack($this->resourceStack);
        return $this->mainBuilder->build();
    }

    private function initHeaderStack(Format $format)
    {
        $this->headerStack = new HeaderStack($format);
        $this->headerStack->setPage($this->newObject());
        $this->headerStack->setCatalog($this->newObject());
        $this->headerStack->setResource($this->newObject());
        $this->headerStack->setInformation($this->newObject());
    }

    private function initPagesStack(Format $format)
    {
        $this->pagesStack = new PageStack($format);
        $this->pagesStack->setParentReference($this->headerStack->getPage());
        $this->pagesStack->setResourcesReference($this->headerStack->getResource());
    }

    private function initResourceStack(Format $format)
    {
        $this->resourceStack = new ResourceStack($format);
        $this->resourceStack->setResourceReference($this->headerStack->getResource());
    }

    private function initTrailerStack(Format $format)
    {
        $this->trailerStack = new TrailerStack($format);
        $this->trailerStack->setRootReference($this->headerStack->getCatalog());
        $this->trailerStack->setInfoReference($this->headerStack->getInformation());
    }

    private function newObject()
    {
        return $this->objectStack->appendObject(new Object($this->objectCounter++));
    }

}
