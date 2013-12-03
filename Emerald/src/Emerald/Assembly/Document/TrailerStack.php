<?php

namespace Emerald\Assembly\Document;

use Emerald\Assembly\Document\Abstracts\Stack;
use Emerald\Document\Object;

class TrailerStack extends Stack
{
    
    private $objects;
    private $sizeReference;
    private $rootReference;
    private $infoReference;

    public function __construct()
    {
        $this->objects = new \ArrayObject();
    }

    public function appendObject(Object $object)
    {
        $this->objects->append($object);
        return $this;
    }

    public function setSizeReference(Object $reference)
    {
        $this->sizeReference = $reference;
        return $this;
    }

    public function setRootReference(Object $reference)
    {
        $this->rootReference = $reference;
        return $this;
    }

    public function setInfoReference(Object $reference)
    {
        $this->infoReference = $reference;
        return $this;
    }

    public function getSizeReference()
    {
        return $this->sizeReference;
    }

    public function getRootReference()
    {
        return $this->rootReference;
    }

    public function getInfoReference()
    {
        return $this->infoReference;
    }

    public function getObjects()
    {
        return $this->objects;
    }
}
