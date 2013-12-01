<?php

namespace Emerald\Pdf\Text;

use Emerald\Interfaces\Pdf\Element;

class Text implements Element
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
     * @var float text's left position
     */
    private $left;

    /**
     * @var float text's bottom position
     */
    private $bottom;

    /**
     * @var String text's content
     */
    private $text;

    public function __construct($text, $left, $bottom)
    {
        $this->text = $text;
        $this->left = $left;
        $this->bottom = $bottom;
        $this->fontSize = 12.00;
        $this->fontReference = 'F1';
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

    public function setText($text)
    {
        $this->text = $text;
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

    public function getText()
    {
        return $this->text;
    }

    public function out()
    {
        return "BT /{$this->fontReference} {$this->fontSize} Tf {$this->left} {$this->bottom} Td ({$this->text})Tj ET";
    }

}
