<?php

namespace Emerald\Assembly\Resource;

use Emerald\Assembly\Document\Abstracts\Builder;
use Emerald\Type\FontType;
use Emerald\Pdf\Resources\Font;

class FontBuilder extends Builder
{
    
    private $reference;
    private $fontType;
    private $font;

    public function __construct($reference, Font $font)
    {
        parent::__construct();
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
            'i' => $this->font->getItalic(),
        ));

        $this->append($this->fontType->out());
    }

}
