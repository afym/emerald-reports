<?php 

namespace Emerald\Type;

class Contents extends AbstractType
{
	public function __construct()
    {
        $this->format = ' /Contents %s';
    }

    /**
     * Set page's contents (c) a reference value
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