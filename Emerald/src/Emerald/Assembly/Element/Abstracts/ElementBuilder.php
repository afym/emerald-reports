<?php

namespace Emerald\Assembly\Element\Abstracts;

abstract class ElementBuilder
{

    protected $out;

    public function __construct()
    {
        $this->out = '';
    }

    protected function append($out)
    {
        $this->out .= $this->newLine($out);
    }

    abstract public function build();
}
