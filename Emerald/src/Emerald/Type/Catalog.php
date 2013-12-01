<?php

namespace Emerald\Type;

use Emerald\Type\Abstracts\Type;

class Catalog extends Type
{

    public function __construct()
    {
        parent::__construct();
        $this->format = '<</Type /Catalog /Pages %s >>';
    }

    /**
     * Set Catalog's page reference (p)
     * 
     * @param Array $values
     *
     * @return void
     */
    public function setValue($value)
    {
        $this->out = sprintf($this->format, $value['p']);
    }

}
