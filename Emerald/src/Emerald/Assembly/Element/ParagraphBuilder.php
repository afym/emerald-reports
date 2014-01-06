<?php

namespace Emerald\Assembly\Element;
use Emerald\Assembly\Document\Abstracts\Builder;
use Emerald\Pdf\Text\Paragraph;
use Emerald\Pdf\Page\Format;
use Emerald\Type\Text;
use Emerald\Type\ColorText;

class ParagraphBuilder extends Builder
{

    private $paragraph;
    private $format;
    private $text;
    private $color;

    public function __construct(Paragraph $paragraph, Format $format)
    {
        parent::__construct();
        $this->paragraph = $paragraph;
        $this->format = $format;
        $this->text = new Text();
        $this->color = new ColorText();
    }

    public function build()
    {
        return $this->out;
    }

}
