<?php

namespace Emerald\Assembly\Resource;

use Emerald\Assembly\Document\Abstracts\Builder;
use Emerald\Assembly\Resource\FontBuilder;
use Emerald\Assembly\Resource\ResourceStack;
use Emerald\Pdf\Resources\Font;
use Emerald\Type\Resources;

class ResourceBuilder extends Builder
{

    private $resourceStack;
    private $resourcesType;
    private $xobjectsOut;
    private $fontsOut;

    public function __construct(ResourceStack $resourceStack)
    {
        parent::__construct();
        $this->resourcesType = new Resources();
        $this->resourceStack = $resourceStack;
        $this->fontsOut = '';
        $this->xobjectsOut = '';
    }

    public function build()
    {
        $this->buildFonts();
        $this->buildResourceType();

        return $this->resourceStack->getResourceReference()->setContent($this->out)->out();
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
        $fontBuilder = new FontBuilder($reference, $font);
        return $fontBuilder->build();
    }

}
