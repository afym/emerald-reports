<?php

namespace Emerald\Assembly\Resource;

use Emerald\Assembly\Document\Abstracts\ElementBuilder;
use Emerald\Type\FontType;
use Emerald\Pdf\Page\Font;

class FontBuilder extends ElementBuilder
{
    
    private $reference,
    private $fontType;
    private $font;

    public function __construct($reference, Font $font)
    {
        $this->reference = $reference;
        $this->fontType = new FontType();
        $this->font = $font;
    }

    public function build()
    {
        $this->buildFontType();
        return $this->out;
    }

    private function buildFontType()
    {
        $this->fontType->setValue(array(
            'r' => $this->reference,
            'f' => $this->font->getFamily(),
            'b' => $this->font->getBold(),
            'e' => $this->font->getEncoding(),
        ));

        $this->append($this->fontType->out());
    }

}
