<?php
/**
 * Emerald Library
 * 
 * @package Document
 * @author Angel Ybarhuen <angel.fym@gmail.com>
 */
namespace Emerald\Document;

use Emerald\Interfaces\OutputInterface;

class Object implements OutputInterface
{

    /**
     * @var int object's number
     */
    private $number;

    /**
     * @var int object's revision
     */
    private $revision;

    /**
     * @var String object´s content
     */
    private $content;

    /**
    * @var String format
    */
    private $format;

    public function __construct($number, $revision = 0)
    {
        $this->number = $number;
        $this->revision = $revision;
        $this->content = '';
        $this->format = '%s %s obj << %s >> endobj';
    }

    public function getNumber()
    {
        return $this->number;
    }

    public function setNumber($number)
    {
        $this->number = $number;
         return $this;
    }

    public function getRevision()
    {
        return $this->revision;
    }

    public function setRevision($revision)
    {
        $this->revision = $revision;
         return $this;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    public function getLength()
    {
        return strlen($this->content);
    }

    public function getReference()
    {
        return " {$this->number} {$this->revision} R";
    }

    public function out()
    {
        return $this->getOut();
    }

    private function getOut()
    {
        return sprintf($this->format, $this->number, $this->revision, $this->content);
    }
}