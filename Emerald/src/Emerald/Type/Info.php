<?php

namespace Emerald\Type;

use Emerald\Type\Abstracts\Type;
use Emerald\Constant\EmeraldEnum;

class Info extends Type
{

    public function __construct()
    {
        parent::__construct();
        $this->format = '<< /Producer (%s) /CreationDate (%s) /Title (%s) /Subject (%s) /Author (%s) /Keywords (%s) /Creator (%s) >>';
    }

    /**
     * Set page's information (d, t, s, a, k, c)
     * 
     * @param Array $values
     *
     * @return void
     */
    public function setValue($value)
    {
        $p = EmeraldEnum::PRODUCER;
        $d = $value['d']; //D:YmdHis
        $t = isset($value['t']) ? $value['t'] : '';
        $s = isset($value['s']) ? $value['s'] : '';
        $a = isset($value['a']) ? $value['a'] : '';
        $k = isset($value['k']) ? $value['k'] : '';
        $c = isset($value['c']) ? $value['c'] : '';

        $this->out = sprintf($this->format, $p, $d, $t, $s, $a, $k, $c);
    }

}
