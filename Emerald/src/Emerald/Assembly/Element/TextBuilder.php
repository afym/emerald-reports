<?php

namespace Emerald\Assembly\Element;

use Emerald\Assembly\Document\Abstracts\Builder;

class TextBuilder extends Builder
{

    protected $textBuilder;
    protected $reference;
    protected $bold;
    protected $italic;
    protected $family;

    public function build()
    {
        return;
    }

    protected function processReference()
    {
        $reference = explode('-', $this->textBuilder->getFontReference());

        $this->reference = $reference[0];
        $this->family = $reference[1];
        $this->bold = $reference[2];
        $this->italic = $reference[3];
    }

}
