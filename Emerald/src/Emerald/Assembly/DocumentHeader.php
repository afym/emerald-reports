<?php

namespace Emerald\Assembly;

use Emerald\Document\Header;
use Emerald\Interfaces\OutputInterface;
use Emerald\Assembly\PagesMedia;
use Emerald\Assembly\PagesCatalog;

class DocumentHeader implements OutputInterface
{

    private $header;
    private $pagesMedia;
    private $pagesCatalog;
    private $out;

    public function __construct($version)
    {
        $this->header = new Header($version);
        $this->out = '';
    }

    public function setPagesMedia(PagesMedia $pagesMedia)
    {
        $this->pagesMedia = $pagesMedia;

        return $this;
    }

    public function setPagesCatalog(PagesCatalog $pagesCatalog)
    {
        $this->pagesCatalog = $pagesCatalog;

        return $this;
    }

    public function out()
    {
        $this->getHeaderOut();

        return $this->out;
    }

    private function getHeaderOut()
    {
        $this->out = "{$this->header->out()} {$this->pagesCatalog->out()} {$this->pagesMedia->out()}";
    }

}