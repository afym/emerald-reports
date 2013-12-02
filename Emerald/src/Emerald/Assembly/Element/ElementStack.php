<?php

namespace Emerald\Assembly\Element;

use Emerald\Assembly\Element\Abstracts\Stack;
use Emerald\Interfaces\Pdf\Element;

class ElementStack extends Stack
{

    public function __construct()
    {
        parent::__construct();
    }

    public function appendElement(Element $element)
    {
        
    }

}
