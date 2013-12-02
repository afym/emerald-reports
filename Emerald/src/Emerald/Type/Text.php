<?php

namespace Emerald\Type;

use Emerald\Type\Abstracts\Type;

class Text extends Type
{

    public function __construct()
    {
        parent::__construct();

        $this->format = 'BT /%s %s Tf %s %s Td (%s) Tj ET';
    }

    /**
     * Set Parent, Resources and Contents (f, s, l, b, t)
     * 
     * @param Array $values
     *
     * @return void
     */
    public function setValue($value)
    {
        $this->out = sprintf($this->format, $value['f'], $value['s'], $value['l'], $value['b'], $value['t']);
    }

}
