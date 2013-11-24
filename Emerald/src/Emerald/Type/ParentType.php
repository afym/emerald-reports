<?php 

namespace Emerald\Type;

class ParentType extends AbstractType
{
	public function __construct()
    {
        $this->format = ' /Parent %s';
    }

    /**
     * Set page's parent (p)
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