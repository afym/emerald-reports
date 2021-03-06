<?php
/**
 * Emerald Library || Property of Jesus Christ King of Kings !!!
 * @package Document
 * @bible John 3:16
 * @author Angel Ybarhuen <angel.fym@gmail.com>
 */
namespace Emerald\Type;

use Emerald\Type\Abstracts\Type;


class TrailerSize extends Type
{
    public function __construct()
    {
        parent::__construct();
        $this->format = '<< /Size %s /Root %s /Info %s >>';
    }

    /**
     * Set size, root and info (s, r, i)
     * 
     * @param Array $values
     *
     * @return void
     */
    public function setValue($value)
    {
        $this->out = sprintf($this->format, $value['s'], $value['r'], $value['i']);
    }

}
