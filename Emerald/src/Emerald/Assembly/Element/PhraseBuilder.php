<?php

namespace Emerald\Assembly\Element;

use Emerald\Assembly\Document\Abstracts\ElementBuilder;
use Emerald\Pdf\Text\Phrase;
use Emerald\Pdf\Page\Format;
use Emerald\Type\Text;
use Emerald\Type\ColorText;

class PhraseBuilder extends ElementBuilder
{

    private $phrase;
    private $format;
    private $fontReference;
    private $text;
    private $color;

    public function __construct(Phrase $phrase, Format $format, $fontReference)
    {
        parent::__construct();
        $this->phrase = $phrase;
        $this->format = $format;
        $this->fontReference = $fontReference;
        $this->text = new Text();
        $this->color = new ColorText();
    }

    public function build()
    {
        $this->buildText();
        $this->validateColored();

        return $this->out;
    }

    private function buildText()
    {
        $this->text->setValue(array(
            'f' => $this->fontReference, 
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

    private function getBottom()
    {
        $height = $this->format->getHeight() - (2 * $this->format->getBottom());

        if ($this->phrase->getBottom() < $height)
            return $this->phrase->getBottom() + $this->format->getBottom();
        }

        return $height;
    }
    
    private function getLeft()
    {
        $width = $this->format->getWidth() - (2 * $this->format->getLeft());

        if ($this->phrase->getLeft() < $width)
            return $this->phrase->getLeft() + $this->format->getLeft();
        }

        return $width;
    }
}
