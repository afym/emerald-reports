<?php

namespace Emerald\Assembly\Element;

use Emerald\Pdf\Text\Phrase;
use Emerald\Pdf\Page\Format;

class ParagraphTextBuilder
{

    private $format;
    private $paragraph;
    private $currentWidth;

    /**
     *  @param String $paragraph
     */
    public function __construct($paragraph, Format $format, $currentWidth)
    {
        $this->paragraph = $paragraph;
        $this->format = $format;
        $this->currentWidth = $currentWidth;
    }

    public function i()
    {
        $width = 0;
        $currentWith = $this->getCurrentWidth();
        $string = $this->paragraphFilterString;
        $length = strlen($this->paragraphFilterString);

        for ($i = 0; $i < $length; $i++) {
            $actualWidth += $currentWith[$string[$i]];
        }

        $this->paragraphLength = $this->getWidthInCurrentWidth($width);
    }

}
