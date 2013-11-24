<?php

/**
 * Emerald Library
 * 
 * @package Document
 * @author Angel Ybarhuen <angel.fym@gmail.com>
 */

namespace Emerald\Document;

use Emerald\Interfaces\OutputInterface;

class Trailer implements OutputInterface
{

    /**
     * @var ArrayObject<Object> document's object
     */
    private $objects;

    /**
     * @var String trailer's format
     */
    private $format;

    /**
     * @var int total of objects
     */
    private $size;

    /**
     * @var int document's length
     */
    private $length;

    /**
     * @var String root's reference
     */
    private $root;

    /**
     * @var String info's reference
     */
    private $info;

    private $out;

    public function __construct()
    {
        $this->objects = new \ArrayObject();
        $this->format = '<< /Size %s /Root %s /Info %s >>';
        $this->length = 0;
        $this->out = '';
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    public function setRoot($root)
    {
        $this->root = $root;
        return $this;
    }

    public function setInfo($info)
    {
        $this->info = $info;
        return $this;
    }

    public function setObjects(\ArrayObject $objects)
    {
        $this->objects = $objects;
        return $this;
    }

    public function out()
    {
        $this->setTrailer();
        $this->setStartXref();
        $this->setContent();
        $this->setFooter();

        return $this->out;
    }

    private function setTrailer()
    {
        $this->out .= "trailer \n";
    }

    private function setStartXref()
    {
        $this->getLength();

        $this->out .= "startxref {$this->length} \n";
    }

    private function setContent()
    {
        $this->out .= sprintf($this->format, $this->size, $this->root, $this->info) . "\n";
    }

    private function setFooter()
    {
        $this->out .= '%%EOF';
    }

    private function getLength()
    {
        foreach ($this->objects as $object) {
            $this->length += $object->getLength();
        }
    }

}