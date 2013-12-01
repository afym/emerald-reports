<?php

namespace Emerald\Pdf\Page;

class Font
{

    private $type;
    private $bold;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getBold()
    {
        return $this->bold;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setBold($bold)
    {
        $this->bold = $bold;
    }

}
