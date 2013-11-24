<?php

namespace Emerald\Type;

class Length extends AbstractType
{
	public function __construct()
    {
        $this->format = '<</Length %s>>';
    }

    /**
     * Set page's length (l)
     * 
     * @param Array $values
     *
     * @return void
     */
    public function setValue($value)
    {
        $this->out = sprintf($this->format, $value['l']);
    }
}