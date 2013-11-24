<?php

namespace Emerald\Type;

class Kids extends AbstractType
{

    public function __construct()
    {
        $this->format = ' /Kids [%s ]';
    }

    /**
     * Set page references (' 3 0 R', ' 4 0 R', ...)
     * 
     * @param Array $values
     *
     * @return void
     */
    public function setValue($value)
    {
        $references = '';

        foreach ($value as $reference) {
            $references .= $reference;
        }

        $this->out = sprintf($this->format, $references);
    }

}

