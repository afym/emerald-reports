<?php

namespace Emerald\Assembly\Element;

use Emerald\Pdf\Text\Paragraph;
use Emerald\Pdf\Page\Format;
use Emerald\Type\Text;
use Emerald\Type\ColorText;
use Emerald\Assembly\Element\TextBuilder;
use Emerald\Constant\Config\FontConfig;
use Emerald\Assembly\Element\ParagraphTextBuilder;

class ParagraphBuilder extends TextBuilder
{

    private $paragraph;
    private $paragraphFilterString;
    private $format;
    private $text;
    private $color;
    private $textBuilder;

    public function __construct(Paragraph $paragraph, Format $format)
    {
        parent::__construct();
        $this->textBuilder = $paragraph;
        $this->paragraph = $paragraph;
        $this->format = $format;
        $this->text = new Text();
        $this->color = new ColorText();
    }

    public function build()
    {
        $this->processReference();
        $this->buildFilterString();
        $this->buildPhrases();

        return $this->out;
    }

    private function buildPhrases()
    {
        $this->textBuilder = new ParagraphTextBuilder($this->paragraphFilterString, $this->format, $this->getCurrentWidth());
    }

    private function getCurrentWidth()
    {
        $bold = $this->bold == 1 ? 'B' : '';
        $italic = $this->italic == 1 ? 'I' : '';
        $fontConfig = new FontConfig("{$this->family}{$bold}{$italic}");

        return $fontConfig->getWidth();
    }

    private function buildFilterString()
    {
        $filter = array("\n", "\r");
        $replace = array('', ' ');

        $this->paragraphFilterString = str_replace($filter, $replace, $this->paragraph->getString());
    }

    private function getWidthInCurrentWidth($width)
    {
        return $width * $this->paragraph->getSize() / 1000;
    }

}
