<?php

namespace Emerald\Type\Abstracts;

use Emerald\Interfaces\OutputInterface;

/**
*   Abstract class for pdf object types
*/
abstract class Type implements OutputInterface
{
    /**
    * @var String $format Type's format
    */

    protected $format;
    /**
    * @var String $out Type's output base on format and value
    */
    protected $out;

    public function __construct()
    {
        $this->format = '';
        $this->out = '';
    }

    /**
    * Absctract method to set value in type
    *
    * @param Array $value 
    * @return void
    */
    abstract function setValue($value);

    /**
    * Returns the output of the type
    *
    * @return String
    */
    public function out()
    {
        return $this->out;
    }

}