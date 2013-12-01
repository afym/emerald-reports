<?php

namespace Emerald\Assembly\Document;

use Emerald\Document\Object;
use Emerald\Assembly\Document\Abstracts\Stack;
use Emerald\Pdf\Page\Format;
use Emerald\Type\Pages;
use Emerald\Type\Catalog;

class HeaderStack extends Stack
{

    private $format;
    private $page;
    private $catalog;
    private $pagesType;
    private $catalogType;
    private $pagesReference;

    public function __construct()
    {
        parent::__construct();

        $this->pagesType = new Pages();
        $this->catalogType = new Catalog();
        $this->pagesReference = new \ArrayObject();
    }

    public function setFormat(Format $format)
    {
        $this->format = $format;

        return $this;
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

    public function getPage()
    {
        return $this->page;
    }

    public function getCatalog()
    {
        return $this->catalog;
    }

    public function appendPageReference(Object $reference)
    {
        $this->pagesReference->append($reference->getReference());

        return $this;
    }

    public function make()
    {
        $this->buildVersion();
        $this->buildPage();
        $this->buildCatalog();

        return $this->out;
    }

    private function buildVersion()
    {
        $this->out .= $this->parse($this->format->getVersion());
    }

    private function buildPage()
    {
        $this->pagesType->setValue(array(
            'k' => $this->getKids(),
            'c' => $this->pagesReference->count(),
            'w' => $this->format->getSize()->getWidth(),
            'h' => $this->format->getSize()->getHeight(),
        ));

        $this->page->setContent($this->parse($this->pagesType->out()));
        $this->out .= $this->parse($this->page->out());
    }

    private function buildCatalog()
    {
        $this->catalogType->setValue(array(
            'p' => $this->page->getReference(),
        ));

        $this->catalog->setContent($this->catalogType->out());
        $this->out .= $this->parse($this->catalog->out());
    }

    private function getKids()
    {
        $kids = $this->pagesReference->getArrayCopy();
        $out = '';

        foreach ($kids as $kid) {
            $out .= "$kid ";
        }

        return $out;
    }

}
