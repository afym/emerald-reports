<?php

namespace Emerald\Assembly;

use Emerald\Document\Object;
use Emerald\Document\Trailer;
use Emerald\Document\CrossReference;
use Emerald\Interfaces\OutputInterface;

class DocumentTrailer implements OutputInterface
{

    private $objects;
    private $catalogObject;
    private $infoObject;
    private $out;

    public function __construct()
    {
        $this->out = '';
    }

    public function setObjects(\ArrayObject $objects)
    {
        $this->objects = $objects;

        return $this;
    }

    public function setCatalogObject(Object $catalogObject)
    {
        $this->catalogObject = $catalogObject;

        return $this;
    }

    public function setInfoObject(Object $infoObject)
    {
        $this->infoObject = $infoObject;

        return $this;
    }

    public function out()
    {
        $this->setCrossReference()->setTrailerType();
        
        return $this->out;
    }

    private function setCrossReference()
    {
        $cross = new CrossReference();
        $cross->setObjects($this->objects);
        
        $this->out .= $cross->out();

        return $this;
    }

    private function setTrailerType()
    {
        $trailer = new Trailer();
        $trailer->setInfo($this->infoObject->getReference())
                ->setRoot($this->catalogObject->getReference())
                ->setSize($this->objects->count())
                ->setObjects($this->objects);

        $this->out .= $trailer->out();

        return $this;
    }

}