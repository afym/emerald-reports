<?php
/**
 * Emerald - pdf library by afym
 */
namespace Emerald\Type;

use Emerald\Type\AbstractType;

/**
* MediaBox object for pages size in pdf format
*/
class MediaBox extends AbstractType
{

    public function __construct()
    {
        $this->format = ' /MediaBox [0 0 %s %s]';
    }

    /**
     * Set wide and high (w, h)
     * 
     * @param Array $values 
     */
    public function setValue($value)
    {
        $this->out = sprintf($this->format, $value['w'], $value['h']);
    }

}