<?php

namespace Emerald\Assembly\Document\Abstracts;

use Emerald\Pdf\Page\Format;

class Stack
{

    protected $format;

    public function __construct(Format $format)
    {
        $this->format = $format;
    }

    public function getFormat()
    {
        return $this->format;
    }

}
