<?php

namespace Emerald\Assembly\Document;

use Emerald\Assembly\Document\HeaderStack;
use Emerald\Assembly\Document\Abstracts\Builder;
use Emerald\Type\Pages;
use Emerald\Type\Catalog;
use Emerald\Type\Info;

class HeaderBuilder extends Builder
{

    private $headerStack;
    private $pages;
    private $catalog;
    private $info;

    public function __construct(HeaderStack $headerStack)
    {
        parent::__construct();

        $this->headerStack = $headerStack;
        $this->pages = new Pages();
        $this->catalog = new Catalog();
        $this->info = new Info();
    }

    public function build()
    {
        $this->buildVersion();
        $this->buildPages();
        $this->buildCatalog();
        $this->buildInformation();

        return $this->out;
    }

    private function buildVersion()
    {
        $this->append($this->headerStack->getFormat()->getVersion());
    }

    private function buildPages()
    {
        $this->pages->setValue(array(
            'k' => $this->headerStack->getPagesReferenceKids(),
            'c' => $this->headerStack->getPagesReferenceCount(),
            'h' => $this->headerStack->getFormat()->getHeight(),
            'w' => $this->headerStack->getFormat()->getWidth(),
        ));

        $this->append($this->headerStack->getPage()->setContent($this->pages->out())->out());
    }

    private function buildCatalog()
    {
        $this->catalog->setValue(array(
            'p' => $this->headerStack->getPage()->getReference(),
        ));

        $this->append($this->headerStack->getCatalog()->setContent($this->catalog->out())->out());
    }

    private function buildInformation()
    {
        $this->info->setValue(array(
            'd' => $this->headerStack->getInfo()->getDate(),
            't' => $this->headerStack->getInfo()->getTitle(),
            's' => $this->headerStack->getInfo()->getSubject(),
            'a' => $this->headerStack->getInfo()->getAuthor(),
            'k' => $this->headerStack->getInfo()->getKeyWords(),
            'c' => $this->headerStack->getInfo()->getCreator(),
        ));

        $this->append($this->headerStack->getInformation()->setContent($this->info->out())->out());
    }

}
