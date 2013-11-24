<?php

namespace Emerald\Type;

class Resources extends AbstractType
{
	public function __construct()
    {
        $this->format = ' /Resources %s';
    }

    /**
     * Set page's resources (r)
     * 
     * @param Array $values
     *
     * @return void
     */
    public function setValue($value)
    {
        $this->out = sprintf($this->format, $value['r']);
    }
}