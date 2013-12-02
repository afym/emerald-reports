<?php

namespace Emerald\Type;

use Emerald\Type\Abstracts\Type;

/**
 * ColorText object for text
 */
class ColorText extends Type
{

    public function __construct()
    {
        parent::__construct();
        $this->format = 'q %.3F %.3F %.3F rg %s Q';
    }

    /**
     * Set font's color in RGB (r, g, b, t)
     * in a previous text
     * 
     * @param Array $values
     *
     * @return void
     */
    public function setValue($value)
    {
        $r = $value['r'] / 255;
        $g = $value['g'] / 255;
        $b = $value['b'] / 255;

        $this->out = sprintf($this->format, $r, $g, $b, $value['t']);
    }

}
