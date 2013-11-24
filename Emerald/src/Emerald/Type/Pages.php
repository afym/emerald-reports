<?php

namespace Emerald\Type;

class Pages extends AbstractType
{
	public function __construct()
	{
		$this->format = '<</Type /Pages %s %s %s >>';
	}
 
	/**
     * Set Kids, Count and MediaBox (k, c, m)
     * 
     * @param Array $values
     *
     * @return void
     */
	public function setValue($value)
	{
		$this->out = sprintf($this->format, $value['k'], $value['c'], $value['m']);
	}
}