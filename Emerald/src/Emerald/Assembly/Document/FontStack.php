<?php

namespace Emerald\Assembly\Document;

use Emerald\Document\Object;
use Emerald\Assembly\Document\Abstracts\Stack;

class FontStack extends Stack
{

    private $fonts;

    public function __construct()
    {
        $this->fonts = new \ArrayObject();
    }

    public function addPageElement(Object $reference)
    {
        $this->fonts->append($reference);
    }

    public function make()
    {
        
    }

}
