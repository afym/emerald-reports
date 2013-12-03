<?php

namespace Emerald\Assembly\Resource;

use Emerald\Assembly\Document\Abstracts\ElementBuilder;
use Emerald\Assembly\Resource\FontBuilder;
use Emerald\Assembly\Resource\ResourceStack;
use Emerald\Pdf\Page\Font;
use Emerald\Type\Resources;

class ResourceBuilder extends ElementBuilder
{
    private $resourceStack;
    private $resourcesType;
    private $xobjectsOut;
    private $fontsOut;
    private $font;

    public function __construct(ResourceStack $resourceStack)
    {
        $this->resourcesType = new Resources();
        $this->resourceStack  = resourceStack;
        $this->fontsOut = '';
        $this->xobjectsOut = '';
    }

    public function build()
    {
        $this->buildFonts();
        $this->buildResourceType();

        return $this->out;
    }

    private function buildResourceType()
    {
        $this->resourcesType->setValue(array(
            'f' => $this->fontsOut,
            'x' => $this->xobjectsOut,
        ));
        
        $this->append($this->resourcesType->out());
    }

    private function buildFonts()
    {
        $fonts = $this->resourceStack->getFonts();

        foreach ($fonts as $reference => $font) {
            $this->fontsOut .= $this->buildFont($reference, $font);
        }
    }

    private function buildFont($reference, Font $font)
    {
        return (new FontBuilder($reference, $font))->buld();
    }
}
