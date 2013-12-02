<?php

namespace Emerald\Pdf\Text;

use Emerald\Interfaces\Pdf\Element;
use Emerald\Pdf\Page\Font;

class Phrase  implements Element
{

    /**
     * @var String font's reference
     */
    private $fontReference;

    /**
     * @var float font's reference
     */
    private $fontSize;

    /**
     * @var float string's left position
     */
    private $left;

    /**
     * @var float string's bottom position
     */
    private $bottom;

    /**
     * @var String string's content
     */
    private $string;

    /**
     * @var Font font's text
     */
    private $font;

    /**
     * @var int red color 
     */
    private $red;
    
    /**
     * @var int green color 
     */
    private $green;
    
    /**
     * @var int blue color 
     */
    private $blue;

    /**
     * @var boolean is colored text
     */
    private $isColored;

    public function __construct($string, $left, $bottom, Font $font = null)
    {
        $this->string = $string;
        $this->left = $left;
        $this->bottom = $bottom;
        $this->font = $font;
        $this->red = 0;
        $this->green = 0;
        $this->blue = 0;
 
    }

    public function setFontReference($fontReference)
    {
        $this->fontReference = $fontReference;
        return $this;
    }

    public function setFontSize($fontSize)
    {
        $this->fontSize = $fontSize;
        return $this;
    }

    public function setLeft($left)
    {
        $this->left = $left;
        return $this;
    }

    public function setBottom($bottom)
    {
        $this->bottom = $bottom;
        return $this;
    }

    public function setString($string)
    {
        $this->string = $string;
        return $this;
    }

    public function getFontReference()
    {
        return $this->fontReference;
    }

    public function getFontSize()
    {
        return $this->fontSize;
    }

    public function getLeft()
    {
        return $this->left;
    }

    public function getBottom()
    {
        return $this->bottom;
    }

    public function getString()
    {
        return $this->string;
    }

    public function getFont()
    {
        return $this->font;
    }
    
    public function setColor($red, $green, $blue)
    {
        $this->isColored = true;
        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
        return $this;
    }

    public function getRed()
    {
        return $this->red;
    }
    
    public function getGreen()
    {
        return $this->green;
    }
    
    public function getBlue()
    {
        return $this->blue;
    }
    
    public function isColored()
    {
        return $this->isColored;
    }

}
