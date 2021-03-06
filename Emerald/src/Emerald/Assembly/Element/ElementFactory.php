<?php

namespace Emerald\Assembly\Element;


use Emerald\Interfaces\Pdf\Element;
use Emerald\Assembly\Element\PhraseBuilder;
use Emerald\Assembly\Element\ParagraphBuilder;
use Emerald\Pdf\Page\Format;

class ElementFactory
{

    private static $format;

    public static function setFormat(Format $format)
    {
        self::$format = $format;
    }

    public static function getOutput(Element $element)
    {
       $class = self::getClass($element);

       switch ($class) {
           case 'Emerald\Pdf\Text\Phrase':
               return (new PhraseBuilder($element , self::$format))->build();
           case 'Emerald\Pdf\Text\Paragraph':
               return (new ParagraphBuilder($element, self::$format))->build();
       }
    }

    private static function getClass(Element $element)
    {
        return get_class($element);
    }
}
