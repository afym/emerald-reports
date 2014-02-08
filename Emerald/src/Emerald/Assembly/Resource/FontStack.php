<?php

namespace Emerald\Assembly\Resource;

use Emerald\Assembly\Document\Abstracts\Stack;
use Emerald\Pdf\Page\Format;
use Emerald\Pdf\Resources\Font;

class FontStack extends Stack
{

    private $fonts;
    private $fontsMapped;
    private $reference;
    private $currentFont;

    public function __construct(Format $format)
    {
        parent::__construct($format);
        $this->reference = 1;
        $this->fonts = new \ArrayObject();
        $this->fontsMapped = new \ArrayObject();
    }

    public function appendFont(Font $font)
    {
        $this->currentFont = $font;
        $this->fonts->offsetSet($this->getReference(), $font);
        $this->fontsMapped->offsetSet($this->getId($font), $this->getReference());
        $this->incrementReference();
        return $this;
    }

    public function getFontReference(Font $font)
    {
        return $this->fontsMapped->offsetGet($this->getId($font));
    }

    public function getFonts()
    {
        return $this->fonts;
    }

    private function incrementReference()
    {
        $this->reference++;
    }

    private function getReference()
    {
        $b = $this->currentFont->getBold() ? 1 : 0;
        $i = $this->currentFont->getItalic()? 1 : 0;

        return "F{$this->reference}-{$this->currentFont->getFamily()}-{$b}-{$i}";
    }

    private function getId(Font $font)
    {
        return spl_object_hash($font);
    }

}
