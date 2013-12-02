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

    public function __construct($string, $left, $bottom, Font $font = null)
    {
        $this->string = $string;
        $this->left = $left;
        $this->bottom = $bottom;
        $this->font = $font;
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

}
