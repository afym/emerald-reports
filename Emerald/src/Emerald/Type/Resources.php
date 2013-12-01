<?php

namespace Emerald\Type;

use Emerald\Type\Abstracts\Type;

class Resources extends Type
{

    public function __construct()
    {
        parent::__construct();
        $this->format = '<< /ProcSet [/PDF /Text /ImageB /ImageC /ImageI] /Font << %s >> /XObject << %s >> >>';
    }

    /**
     * Set page's resources fonts and x objects (f, x)
     * 
     * @param Array $values
     *
     * @return void
     */
    public function setValue($value)
    {
        $this->out = sprintf($this->format, $value['f'], $value['x']);
    }

}
