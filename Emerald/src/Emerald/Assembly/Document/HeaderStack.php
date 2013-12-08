<?php

namespace Emerald\Assembly\Document;

use Emerald\Document\Object;
use Emerald\Assembly\Document\Abstracts\Stack;
USE Emerald\Pdf\Information;
use Emerald\Pdf\Page\Format;

class HeaderStack extends Stack
{

    private $page;
    private $catalog;
    private $resource;
    private $information;
    private $info;
    private $pagesReferenceKids;
    private $pagesReferenceCount;

    public function __construct(Format $format)
    {
        parent::__construct($format);

        $this->info = new Information();
        $this->pagesReferenceKids = '';
        $this->pagesReferenceCount = 0;
    }

    public function setPage(Object $page)
    {
        $this->page = $page;
        return $this;
    }

    public function setCatalog(Object $catalog)
    {
        $this->catalog = $catalog;
        return $this;
    }

    public function setResource(Object $resource)
    {
        $this->resource = $resource;
        return $this;
    }

    public function setInformation(Object $information)
    {
        $this->information = $information;
        return $this;
    }

    public function setInfo(Information $info)
    {
        $this->info = $info;
        return $this;
    }

    public function getInfo()
    {
        return $this->info;
    }

    public function getInformation()
    {
        return $this->information;
    }

    public function getResource()
    {
        return $this->resource;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function getCatalog()
    {
        return $this->catalog;
    }

    public function getPagesReferenceKids()
    {
        return $this->pagesReferenceKids;
    }

    public function getPagesReferenceCount()
    {
        return $this->pagesReferenceCount;
    }

    public function appendPageReference(Object $reference)
    {
        $this->pagesReferenceKids .= "{$reference->getReference()} ";
        $this->pagesReferenceCount++;
        return $this;
    }

}
