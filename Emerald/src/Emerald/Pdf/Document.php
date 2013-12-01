<?php

namespace Emerald\Pdf;

use Emerald\Pdf\Information;
use Emerald\Pdf\Page\Format;
use Emerald\Interfaces\Pdf\Element;
use Emerald\Assembly\Document\PageStack;
use Emerald\Assembly\Document\HeaderStack;
use Emerald\Document\Object;

class Document
{

    private $format;
    private $headerStack;
    private $pagesStack;
    private $objectCounter;

    public function __construct(Format $format)
    {
        $this->format = $format;
        $this->objectCounter = 1;
        $this->headerStack = new HeaderStack();
        $this->headerStack
                ->setPage($this->createObject())
                ->setCatalog($this->createObject())
                ->setFormat($format);

        $this->pagesStack = new PageStack();
        $this->pagesStack
                ->setParentReference($this->headerStack->getPage()->getReference())
                ->setResourcesReference('558 0 R');
    }

    public function addPage()
    {
        $pageReference = $this->createObject();
        $this->pagesStack->appendPageReference($pageReference);
        $this->headerStack->appendPageReference($pageReference);
        $this->pagesStack->appendPageContent($this->createObject());

        return $this;
    }

    public function addFont()
    {
        
    }

    public function addImage()
    {
        
    }

    public function addElement(Element $element)
    {
        $this->pagesStack->appendElement($element);

        return $this;
    }

    public function setInformation(Information $information)
    {
        
    }

    public function render()
    {
        return "{$this->headerStack->make()} {$this->pagesStack->make()}";
    }

    private function createObject()
    {
        return new Object($this->objectCounter++);
    }

}
