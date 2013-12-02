<?php

namespace Emerald\Assembly\Document;

use Emerald\Assembly\Document\Abstracts\Stack;
use Emerald\Type\Resources;
use Emerald\Document\Object;
use Emerald\Interfaces\Pdf\Resource;

class ResourceStack extends Stack
{

    private $fonts;
    private $images;

    public function __construct()
    {
        parent::__construct();

        $this->fonts = new \ArrayObject();
        $this->images = new \ArrayObject();
    }

    public function appendFont(Object $object, Resource $font)
    {
        $this->fonts->append($object->setContent($font->out()));
    }

    public function appendImage(Object $object, Resource $image)
    {
        $this->images->append($object->setContent($image->out()));
    }

    public function make()
    {
        
    }

    private function buildFonts()
    {
        foreach ($this->fonts as $font) {
            $this->out .= $this->parse($font->out());
        }
    }

}
