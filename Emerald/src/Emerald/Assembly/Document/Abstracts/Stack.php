<?php

namespace Emerald\Assembly\Document\Abstracts;

use Emerald\Type\Length;

abstract class Stack
{

    protected $out;
    protected $lengthType;

    public function __construct()
    {
        $this->out = '';
        $this->lengthType = new Length();
    }

    public abstract function make();

    protected function parse($out)
    {
        return "$out \n";
    }

    protected function getLenght($out)
    {
        $this->lengthType->setValue(array('l' => strlen($out)));

        return $this->lengthType->out();
    }

}
