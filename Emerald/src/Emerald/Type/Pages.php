<?php
/**
 * Emerald Library || Property of Jesus Christ King of Kings !!!
 * @package Document
 * @bible John 3:16
 * @author Angel Ybarhuen <angel.fym@gmail.com>
 */
namespace Emerald\Type;

use Emerald\Type\Abstracts\Type;

class Pages extends Type
{

    public function __construct()
    {
        parent::__construct();

        $this->format = '<</Type /Pages /Kids [%s] /Count %s /MediaBox [0 0 %s %s] >>';
    }

    /**
     * Set Kids, Count and MediaBox (k, c, h, w)
     * 
     * @param Array $values
     *
     * @return void
     */
    public function setValue($value)
    {
        $this->out = sprintf($this->format, $value['k'], $value['c'], $value['h'], $value['w']);
    }

}
