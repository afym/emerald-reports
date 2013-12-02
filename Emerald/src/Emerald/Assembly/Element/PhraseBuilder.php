<?php

namespace Emerald\Assembly\Element;

use Emerald\Assembly\Document\Abstracts\ElementBuilder;
use Emerald\Pdf\Text\Phrase;
use Emerald\Pdf\Page\Format;
use Emerald\Type\Text;

class PhraseBuilder extends ElementBuilder
{

    private $phrase;
    private $format;
    private $text;

    public function __construct(Phrase $phrase, Format $format)
    {
        parent::__construct();
        $this->phrase = $phrase;
        $this->format = $format;
        $this->text = new Text();
    }

    public function build()
    {
        
    }

    private function buildText()
    {
        $this->text->setValue(array(
            
        ));
    }
}
