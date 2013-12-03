<?php
/**
 * Emerald Library || Property of Jesus Christ King of Kings !!!
 * @package Document
 * @bible John 3:16
 * @author Angel Ybarhuen <angel.fym@gmail.com>
 */
namespace Emerald\Type;

use Emerald\Type\Abstracts\Type;

/**
 * FontType object for text
 */
class FontType extends Type
{

    public function __construct()
    {
        parent::__construct();
        $this->format = '<< /%s <</Type /Font /BaseFont /%s /Subtype /Type1 /Encoding /%s >> >>';
    }

    /**
     * Set font's reference, name , bold  and endcoding (r, f, b, e)
     * 
     * @param Array $values
     *
     * @return void
     */
    public function setValue($value)
    {
        if ($value['b']) {
            $value['f'] = $value['f'] . '-Bold';
        }
        // -Oblique

        $this->out = sprintf($this->format, $value['r'], $value['f'], $value['e']);
    }

}
