<?php

namespace Emerald\Assembly\Resource;

use Emerald\Assembly\Document\Abstracts\Stack;
use Emerald\Pdf\Page\Font;
use Emerald\Assembly\Resource\FontStack;
use Emerald\Constant\FontEnum;
use Emerald\Pdf\Page\Format;
use Emerald\Document\Object;

class ResourceStack extends Stack
{

    private $fontStack;
    private $resourceReference;

    public function __construct(Format $format)
    {
        parent::__construct($format);
        $this->fontStack = new FontStack();
        $this->fontStack->appendFont((new Font())->getFamiliy(FontEnum::HEVELTICA));
    }

    public function setResourceReference(Object $reference)
    {
        $this->resourceReference = $reference;
        return $this;
    }

    public function addFont(Font $font)
    {
        $this->fontStack->appendFont($font);
        return $this;
    }

    public function getFontReference(Font $font)
    {
        return $this->fontStack->getFontReference($font);
    }

    public function getFonts()
    {
        return $this->fontStack;
    }

}
