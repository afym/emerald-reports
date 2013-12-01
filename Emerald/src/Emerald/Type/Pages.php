<?php

namespace Emerald\Type;

use Emerald\Type\Abstracts\Type;

class Pages extends Type
{

    public function __construct()
    {
        parent::__construct();

        $this->format = '<</Type /Pages /Kids [%s] /Count %s /MediaBox [0 0 %s %s] >>';
    }

    /**
     * Set Kids, Count and MediaBox (k, c, h, w)
     * 
     * @param Array $values
     *
     * @return void
     */
    public function setValue($value)
    {
        $this->out = sprintf($this->format, $value['k'], $value['c'], $value['h'], $value['w']);
    }

}
