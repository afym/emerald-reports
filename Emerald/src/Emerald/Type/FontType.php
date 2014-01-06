<?php

/**
 * Emerald Library || Property of Jesus Christ King of Kings !!!
 * @package Document
 * @bible John 3:16
 * @author Angel Ybarhuen <angel.fym@gmail.com>
 */

namespace Emerald\Type;

use Emerald\Type\Abstracts\Type;
use Emerald\Constant\FontEncodingEnum;
use Emerald\Constant\FontEnum;

/**
 * FontType object for text
 */
class FontType extends Type
{

    public function __construct()
    {
        parent::__construct();
        $this->format = '/%s <</Type /Font /BaseFont /%s /Subtype /Type1 %s >>';
    }

    /**
     * Set font's reference, name , bold , italic (r, f, b, i, e)
     * 
     * @param Array $values
     *
     * @return void
     */
    public function setValue($value)
    {
        $font = "{$value['f']}{$this->decorationFont($value)}";
        $encoding = $this->getEncoding($value);

        $this->out = sprintf($this->format, $value['r'], $font, $encoding);
    }

    private function decorationFont($value)
    {
        if (!$this->isSymbolOrZapfDingbats($value)) {
            if ($value['b'] && $value['i']) {
                return $this->getBoldItalic($value);
            } else if ($value['b']) {
                return '-Bold';
            } else if ($value['i']) {
                return $this->getItalic($value);
            }
        }

        return '';
    }

    private function getEncoding($value)
    {
        if (!$this->isSymbolOrZapfDingbats($value)) {
            return '/Encoding /' . FontEncodingEnum::WINANSI;
        }

        return '';
    }

    private function isSymbolOrZapfDingbats($value)
    {
        if ($value['f'] === FontEnum::SYMBOL || $value['f'] === FontEnum::ZAPFDONGBATS) {
            return true;
        }

        return false;
    }

    private function getBoldItalic($value)
    {
        if ($value['f'] == FontEnum::TIMES) {
            return '-BoldItalic';
        } else {
            return '-BoldOblique';
        }
    }

    private function getItalic($value)
    {
        if ($value['f'] == FontEnum::TIMES) {
            return '-Italic';
        }

        return '-Oblique';
    }

}
