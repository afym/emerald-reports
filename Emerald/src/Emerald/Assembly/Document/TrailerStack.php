<?php

namespace Emerald\Assembly\Document;

use Emerald\Assembly\Document\Abstracts\Stack;
use Emerald\Document\Object;

class TrailerStack extends Stack
{
    
    private $objects;
    
    public function __construct()
    {
        $this->objects = new \ArrayObject();
    }

    public function appendObject(Object $object)
    {
        $this->objects->append($object);
        return $this;
    }

    public function getObjects()
    {
        return $this->objects;
    }
}
