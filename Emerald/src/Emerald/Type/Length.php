<?php

namespace Emerald\Type;

use Emerald\Type\Abstracts\Type;

class Length extends Type
{

    public function __construct()
    {
        parent::__construct();
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
