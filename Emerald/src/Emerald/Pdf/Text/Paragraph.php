<?php

namespace Emerald\Pdf\Text;

use Emerald\Interfaces\Pdf\Element;

class Paragraph implements Element
{

    private $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function out()
    {
        
    }

}
