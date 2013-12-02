<?php

namespace Emerald\Assembly\Element\Abstracts;

class Stack
{

    private $objects;

    public function __construct()
    {
        $this->objects = new \ArrayObject();
    }

    public function isInStack($object)
    {
        foreach ($this->objects as $stackObject) {
            if ($stackObject === $object) {
                return true;
            }
        }

        return false;
    }

    public function appendObject($object)
    {
        $this->objects->append($this->getId($object));
    }

    private function getId($object)
    {
        return spl_object_hash($object);
    }

}
