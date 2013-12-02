<?php

namespace Emerald\Assembly\Element\Abstracts;

abstract class ElementBuilder
{

    protected $out;

    public function __construct()
    {
        $this->out = '';
    }

    abstract public function build();
}
