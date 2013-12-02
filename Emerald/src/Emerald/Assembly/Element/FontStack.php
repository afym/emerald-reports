<?php

namespace Emerald\Assembly\Element;

use Emerald\Assembly\Element\Abstracts\Stack;
use Emerald\Pdf\Page\Font;

class FontStack extends Stack
{

    private $fonts;
    private $fontCounter;

    public function __construct()
    {
        parent::__construct();
        $this->fontCounter = 1;
        $this->fonts = new \ArrayObject();
    }

    public function appendFont(Font $font)
    {
        if (!$this->isInStack($font)) {
            $this->fonts->offsetSet($this->getFontReference(), $font);
            $this->appendObject($font);
            $this->fontCounter++;
        }
    }

    public function getFonts()
    {
        return $this->fonts;
    }

    private function getFontReference()
    {
        return "F{$this->fontCounter}";
    }

}
