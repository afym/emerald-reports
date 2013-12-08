<?php

namespace Emerald\Assembly\Document;

use Emerald\Assembly\Document\Abstracts\Stack;
use Emerald\Pdf\Page\Format;
use Emerald\Document\Object;

class ObjectStack extends Stack
{

    private $objects;

    public function __construct(Format $format)
    {
        parent::__construct($format);
        $this->objects = new \ArrayObject();
    }

    public function appendObject(Object $object)
    {
        $this->objects->append($object);
        return $object;
    }

    public function getObjects()
    {
        return $this->objects;
    }

}
