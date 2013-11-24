<?php

namespace Emerald\Type;

class Page extends AbstractType
{

    public function __construct()
    {
        $this->format = '<</Type /Page %s %s %s>>';
    }

    /**
     * Set Parent, Resources and Contents (p, r, c)
     * 
     * @param Array $values
     *
     * @return void
     */
    public function setValue($value)
    {
        $this->out = sprintf($this->format, $value['p'], $value['r'], $value['c']);
    }

}