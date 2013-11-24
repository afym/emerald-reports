<?php

/**
 * Emerald Library
 * 
 * @package Document
 * @author Angel Ybarhuen <angel.fym@gmail.com>
 */

namespace Emerald\Document;

use Emerald\Interfaces\OutputInterface;

class CrossReference implements OutputInterface
{

    /**
     * @var ArrayObject<Object> document's object
     */
    private $objects;

    /**
     * @var int total of objects
     */
    private $total;

    /**
     * @var String cross reference's out
     */
    private $out;

    public function __construct()
    {
        $this->objects = new \ArrayObject();
        $this->out = '';
    }

    public function setObjects(\ArrayObject $objects)
    {
        $this->objects = $objects;
    }

    public function out()
    {
        $this->setXref()->setXrefCounter()->setStartObject();

        foreach ($this->objects as $object) {
            $this->out .= sprintf('%010d 00000 n ', $object->getNumber()) . "\n";
        }

        return $this->out;
    }

    private function getTotal()
    {
        return $this->objects->count() + 1;
    }

    private function setXref()
    {
        $this->out .= "xref \n";

        return $this;
    }

    private function setXrefCounter()
    {
        $this->out .= '0 ' . $this->getTotal() . "\n";
        return $this;
    }

    private function setStartObject()
    {
        $this->out .= "0000000000 65535 f \n";

        return $this;
    }

}