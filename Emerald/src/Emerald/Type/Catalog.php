<?php

namespace Emerald\Type;

class Catalog extends AbstractType
{

    public function __construct()
    {
        $this->format = '<</Type /Catalog /Pages %s >>';
    }

    /**
     * Set Catalog's page reference (c)
     * 
     * @param Array $values
     *
     * @return void
     */
    public function setValue($value)
    {
        $this->out = sprintf($this->format, $value['c']);
    }

}