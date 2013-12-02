<?php

namespace Emerald\Assembly\Document\Abstracts;

abstract class Builder
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

    private function newLine($out)
    {
        return "$out \n";
    }

    abstract public function build();
}
