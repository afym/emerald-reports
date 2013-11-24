<?php

namespace Emerald\Assembly;

use Emerald\Document\Object;
use Emerald\Type\Catalog;
use Emerald\Interfaces\OutputInterface;

class PagesCatalog implements OutputInterface
{

    private $catalogObject;
    private $pagesObject;

    public function __construct(Object $catalogObject, Object $pagesObject)
    {
        $this->catalogObject = $catalogObject;
        $this->pagesObject = $pagesObject;
    }

    public function out()
    {
        $this->setCatalog();

        return $this->catalogObject->out();
    }

    private function setCatalog()
    {
        $catalog = new Catalog();
        $value = array('c' => $this->pagesObject->getReference());
        $catalog->setValue($value);

        $this->catalogObject->setContent($catalog->out());
    }

}