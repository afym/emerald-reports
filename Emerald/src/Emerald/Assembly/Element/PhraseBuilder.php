<?php

namespace Emerald\Assembly\Element;

use Emerald\Pdf\Text\Phrase;
use Emerald\Pdf\Page\Format;
use Emerald\Type\Text;
use Emerald\Type\ColorText;
use Emerald\Assembly\Element\TextBuilder;

class PhraseBuilder extends TextBuilder
{

    private $phrase;
    private $format;
    private $text;
    private $color;

    public function __construct(Phrase $phrase, Format $format)
    {
        parent::__construct();
        $this->phrase = $phrase;
        $this->textBuilder = $phrase;
        $this->format = $format;
        $this->text = new Text();
        $this->color = new ColorText();
    }

    public function build()
    {
        $this->processReference();
        $this->buildText();
        $this->validateColored();

        return $this->out;
    }

    private function buildText()
    {
        $this->text->setValue(array(
            'f' => $this->reference,
            's' => $this->phrase->getSize(),
            'l' => $this->getLeft(),
            'b' => $this->getBottom(),
            't' => $this->phrase->getString(),
        ));
    }

    private function setColorText()
    {
        $this->color->setValue(array(
            'r' => $this->phrase->getRed(),
            'g' => $this->phrase->getGreen(),
            'b' => $this->phrase->getBlue(),
            't' => $this->text->out(),
        ));
    }

    private function validateColored()
    {
        if ($this->phrase->isColored()) {
            $this->setColorText();
            $this->append($this->color->out());
        } else {
            $this->append($this->text->out());
        }
    }

    private function getLeft()
    {
        return $this->phrase->getLeft() + $this->format->getLeft();
    }

    private function getBottom()
    {
        return $this->format->getHeight() - $this->phrase->getTop() - $this->format->getTop();
    }

}
