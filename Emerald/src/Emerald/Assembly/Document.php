<?php

namespace Emerald\Assembly;

use Emerald\Document\Object;
use Emerald\Pdf\Element;
use Emerald\Pdf\Page\Format;
use Emerald\Constant\VersionEnum;
use Emerald\Assembly\PagesCatalog;
use Emerald\Assembly\DocumentHeader;
use Emerald\Assembly\DocumentBody;
use Emerald\Assembly\DocumentTrailer;

class Document
{

    /**
     * @var String Document's pdf version
     */
    private $version;

    /**
     * @var String Document's content
     */
    private $out;

    /**
     * @var int Document's internal counter
     */
    private $counter;

    /**
     * @var ArrayObject<PageContent> Document's objects pages
     */
    private $pages;

    /**
     * @var int Document's current page's number
     */
    private $current;

    /**
     * @var ArrayObject<Object> Document's initial objects
     */
    private $initial;

    /**
     * @var ArrayObject<Object> Document's total objects
     */
    private $objects;

    /**
     * @var Format Document's format settings
     */
    private $format;

    public function __construct(Format $format, $version = null)
    {
        $this->version = !is_null($version) ? $version : VersionEnum::PDF_1_7;
        $this->out = '';
        $this->counter = 1;
        $this->format = $format;
        $this->pages = new \ArrayObject();
        $this->objects = new \ArrayObject();

        $this->setInitialObjects();
    }

    public function render()
    {
        $this->prepareDocument();

        return $this->out;
    }

    private function prepareDocument()
    {
        $this->out = "{$this->getHeader()->out()} {$this->getBody()->out()} {$this->getTrailer()->out()}";
    }

    /**
     * Adds a new page in the document
     *
     * @return Document
     */
    public function addPage()
    {
        $this->current = $this->counter;
        $this->pages->offsetSet($this->current, $this->getPageContent());

        return $this;
    }

    /**
     * Adds a new element in the current page
     *
     * @var Element $element
     *
     * @return Document
     */
    public function addElement(Element $element)
    {
        $this->pages->offsetGet($this->current)->addElement($element);

        return $this;
    }

    public function addFont()
    {
       $this->initial->offsetGet('resources')->setContent('<</Font <</F1 5 0 R>> >>');
    }

    public function addInfo()
    {
        $this->initial->offsetGet('info')->setContent('<< /Producer (FPDF 1.7) /CreationDate (D:20131031180709)>>');
    }

    private function setInitialObjects()
    {
        $this->initial = new \ArrayObject();
        $this->initial->offsetSet('catalog', $this->getObject());
        $this->initial->offsetSet('pages', $this->getObject());
        $this->initial->offsetSet('resources', $this->getObject());
        $this->initial->offsetSet('info', $this->getObject());
    }

    private function getPageCatalog()
    {
        return new PagesCatalog($this->initial->offsetGet('catalog'), $this->initial->offsetGet('pages'));
    }

    private function getPagesMedia()
    {
        $pageSize = new PagesMedia($this->initial->offsetGet('pages'), $this->format);
        $pageSize->setTotalPages($this->pages);

        return $pageSize;
    }

    private function getPageContent()
    {
        $pageContent = new PageContent($this->getObject(), $this->getObject());
        $pageContent->setParentType($this->initial->offsetGet('pages'))
                ->setResources($this->initial->offsetGet('resources'));

        return $pageContent;
    }

    /**
     * Gets a new object
     * 
     * @return Object
     */
    private function getObject()
    {
        $object = new Object($this->counter++);

        $this->objects->append($object);

        return $object;
    }

    private function getHeader()
    {
        $header = new DocumentHeader($this->version);
        $header->setPagesCatalog($this->getPageCatalog())
                ->setPagesMedia($this->getPagesMedia());
        
        return $header;
    }
    
    private function getBody()
    {
        $body = new DocumentBody($this->pages);

        return $body;
    }

    private function getTrailer()
    {
        $trailer = new DocumentTrailer();
        $trailer->setCatalogObject($this->initial->offsetGet('catalog'))
                ->setInfoObject($this->initial->offsetGet('info'))
                ->setObjects($this->objects);

        return $trailer;
    }

}
