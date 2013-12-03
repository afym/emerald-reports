<?php
/**
 * Emerald Library || Property of Jesus Christ King of Kings !!!
 * @package Document
 * @bible John 3:16
 * @author Angel Ybarhuen <angel.fym@gmail.com>
 */
namespace Emerald\Type;

use Emerald\Type\Abstracts\Type;

class Catalog extends Type
{

    public function __construct()
    {
        parent::__construct();
        $this->format = '<</Type /Catalog /Pages %s >>';
    }

    /**
     * Set Catalog's page reference (p)
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
