<?php

namespace Emerald\Type;

use Emerald\Type\Abstracts\Type;
use Emerald\Constant\FontEncodings;

/**
 * FontType object for text
 */
class FontType extends Type
{

    public function __construct()
    {
        parent::__construct();
        $this->format = '<</Type /Font /BaseFont /%s /Subtype /Type1 /Encoding /%s >>';
    }

    /**
     * Set font's name , bold  and endcoding (f, b, e)
     * 
     * @param Array $values
     *
     * @return void
     */
    public function setValue($value)
    {
        if ($value['b']) {
            $value['f'] = $value['f'] . '-Bold';
        }
        // -Oblique
        if (!isset($value['e'])) {
            $value['e'] = FontEncodings::WINANSI;
        }

        $this->out = sprintf($this->format, $value['f'], $value['e']);
    }

}
