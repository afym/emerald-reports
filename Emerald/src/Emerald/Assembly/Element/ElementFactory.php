<?php

namespace Emerald\Assembly\Element;

use Emerald\Assembly\Element\Abstracts\Stack;
use Emerald\Interfaces\Pdf\Element;
use Emerald\Assembly\Element\PhraseBuilder;

class ElementFactory extends Stack
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
               return (new PhraseBuilder($element , self::$format));
               break;
       }
    }

    private static function getClass(Element $element)
    {
        return get_class($element);
    }
}
