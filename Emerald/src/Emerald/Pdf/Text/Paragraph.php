<?php

namespace Emerald\Pdf\Text;

use Emerald\Pdf\Text\Phrase;

class Paragraph extends Phrase
{

    public function __construct($string, $bottom, $left, $size = 8.0, $fontReference = 'F1-Helvetica-0-0')
    {
        parent::__construct($string, $bottom, $left, $size, $fontReference);
    }

}
