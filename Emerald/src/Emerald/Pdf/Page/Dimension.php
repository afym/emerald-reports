<?php

namespace Emerald\Pdf\Page;

class Dimension
{

    /**
     * @var float page's width
     */
    private $width;

    /**
     * @var float page's height
     */
    private $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

}
