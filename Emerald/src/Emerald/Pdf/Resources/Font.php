<?php

namespace Emerald\Pdf\Page;

use Emerald\Interfaces\Pdf\Resource;

class Font
{

    private $familiy;
    private $red;
    private $green;
    private $blue;
    private $bold;
    private $italic;
    private $underline;
    private $isColored;

    public function __construct($familiy)
    {
        $this->familiy = $familiy;
        $this->bold = false;
        $this->italic = false;
        $this->underline = false;
        $this->red = 0;
        $this->green = 0;
        $this->blue = 0;
        $this->isColored = false;
    }

    public function setFamiliy($familiy)
    {
        $this->familiy = $familiy;
        return $this;
    }

    public function setBold()
    {
        $this->bold = true;
        return $this;
    }

    public function setItalic()
    {
        $this->italic = true;
        return $this;
    }

    public function setUnderline()
    {
        $this->underline = true;
        return $this;
    }

    public function setColor($red, $green, $blue)
    {
        $this->isColored = true;
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
        return $this;
    }

    public function getFamiliy()
    {
        return $this->familiy;
    }

    public function getBold()
    {
        return $this->bold;
    }
    
    public function getItalic()
    {
        return $this->italic;
    }
    
    public function getUnderline()
    {
        return $this->underline;
    }
    
    public function isColored()
    {
        return $this->isColored;
    }
}
