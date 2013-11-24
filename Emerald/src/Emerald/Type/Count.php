<?php

namespace Emerald\Type;

use Emerald\Type\AbstractType;

class Count extends AbstractType
{
    public function __construct()
    {
    	$this->format = ' /Count %s';
    }

    /**
     * Set page references c
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