<?php

namespace Emerald\Assembly\Resource;

use Emerald\Assembly\Document\Abstracts\ElementBuilder;
use Emerald\Type\Resources;

class FontBuilder extends ElementBuilder
{

    private $resourcesType;
    private $font;

    public function __construct()
    {
        $this->resourcesType = new Resources();
    }

    public function build()
    {
       
        return $this->out;
    }

    private function buildFontType()
    {
        $this->resourcesType->setValue(array(
            'f' => '',
            'x' => '',
        ));
    }

}
