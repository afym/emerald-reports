<?php

namespace Emerald\Pdf\Text;

use Emerald\Interfaces\Pdf\Element;

class Phrase implements Element
{

    /**
     * @var String font's reference
     */
    private $fontReference;

    /**
     * @var float text's size
     */
    private $size;

    /**
     * @var float string's left position
     */
    private $left;

    /**
     * @var float string's top position
     */
    private $top;

    /**
     * @var String string's content
     */
    private $string;

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

    public function __construct($string, $top, $left, $size = 8.0, $fontReference = 'F1-Helvetica-0-0')
    {
        $this->string = $string;
        $this->left = $left;
        $this->top = $top;
        $this->fontReference = $fontReference;
        $this->size = $size;
        $this->red = 0;
        $this->green = 0;
        $this->blue = 0;
    }

    public function setFontReference($fontReference)
    {
        $this->fontReference = $fontReference;
        return $this;
    }

    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }

    public function setLeft($left)
    {
        $this->left = $left;
        return $this;
    }

    public function setTop($top)
    {
        $this->top = $top;
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

    public function getSize()
    {
        return $this->size;
    }

    public function getLeft()
    {
        return $this->left;
    }

    public function getTop()
    {
        return $this->top;
    }

    public function getString()
    {
        return $this->string;
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
