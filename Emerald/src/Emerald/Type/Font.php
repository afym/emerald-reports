<?php

namespace Emerald\Type;

/**
 * Font object for text
 */
class Font extends AbstractType
{

    public function __construct()
    {
		$this->format = '<</Type /Font /Subtype /Type1 /BaseFont /Helvetica >>';
    }

    public function setValue()
    {
        $this->out = $this->format;
    }

}