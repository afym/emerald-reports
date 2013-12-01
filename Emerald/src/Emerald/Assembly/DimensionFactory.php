<?php

namespace Emerald\Assembly;

use Emerald\Exception\PageException;
use Emerald\Constant\SizeEnum;
use Emerald\Pdf\Page\Dimension;

class DimensionFactory
{

    /**
     * 	Get the page's dimension for the document.
     *  
     * 	@throw	PageException
     *
     * 	@return Dimension
     */
    public static function get($size)
    {
        switch ($size) {
            case SizeEnum::A4:
                return new Dimension(595.28, 841.89);

            case SizeEnum::A3:
                return new Dimension(841.89, 1190.55);

            case SizeEnum::A5:
                return new Dimension(420.94, 595.28);

            case SizeEnum::LETTER:
                return new Dimension(612, 792);

            case SizeEnum::LEGAL:
                return new Dimension(612, 1008);

            default:
                throw new PageException("Undefined page size");
        }
    }

}
