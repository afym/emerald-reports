<?php

namespace Emerald\Assembly\Document;

use Emerald\Assembly\Document\Abstracts\Stack;
use Emerald\Pdf\Page\Format;
use Emerald\Document\Object;

class TrailerStack extends Stack
{

    private $objects;
    private $rootReference;
    private $infoReference;

    public function __construct(Format $format)
    {
        parent::__construct($format);
        $this->objects = new \ArrayObject();
    }

    public function setObjects(\ArrayObject $objects)
    {
        $this->objects = $objects;
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
