<?php
/**
 * Emerald Library || Property of Jesus Christ King of Kings !!!
 * @package Document
 * @bible John 3:16
 * @author Angel Ybarhuen <angel.fym@gmail.com>
 */
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
