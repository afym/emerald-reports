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
        $this->format = 'q %s %s %s rg %s Q';
    }

    /**
     * Set font's color in RGB (r, g, b, t)
     * 
     * @param Array $values
     *
     * @return void
     */
    public function setValue($value)
    {
        //'%.3F %.3F %.3F rg',$r/255,$g/255,$b/255
        $this->out = sprintf($this->format);
    }

}
