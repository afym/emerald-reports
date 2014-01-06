<?php

namespace Emerald\Pdf\Resources;

class Font
{

    private $familiy;
    private $bold;
    private $italic;
    private $underline;

    public function __construct($familiy)
    {
        $this->familiy = $familiy;
        $this->bold = false;
        $this->italic = false;
        $this->underline = false;
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

    public function getFamily()
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

}
