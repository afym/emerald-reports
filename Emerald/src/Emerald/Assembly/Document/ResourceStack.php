<?php

namespace Emerald\Assembly\Document;

use Emerald\Assembly\Document\Abstracts\Stack;
use Emerald\Type\Resources;

class ResourceStack extends Stack
{

    private $fonts;
    
    public function __construct()
    {
        parent::__construct();
        
        $this->fonts = new \ArrayObject();
    }

    public function appendFont($fonts)
    {
        
    }

    public function setImages(\ArrayObject $images)
    {
        
    }

    public function make()
    {
        
    }

}
