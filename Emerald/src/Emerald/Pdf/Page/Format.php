<?php

namespace Emerald\Pdf\Page;

use Emerald\Assembly\DimensionFactory;
use Emerald\Constant\OrientationEnum;
use Emerald\Constant\VersionEnum;

class Format
{

    /**
     * @var Size format's size
     */
    private $size;

    /**
     * @var float top margin
     */
    private $top;

    /**
     * @var float bottom margin
     */
    private $bottom;

    /**
     * @var float left margin
     */
    private $left;

    /**
     * @var float right margin
     */
    private $right;

    /**
     * @var String orientation
     */
    private $orientation;
    private $version;

    public function __construct($size, $version = null, $top = null, $bottom = null, $left = null, $right = null)
    {
        $this->size = !is_null($size) ? DimensionFactory::get($size) : DimensionFactory::get(SizeEnum::A4);
        $this->version = !is_null($version) ? $version : VersionEnum::PDF_1_7;
        $this->top = !is_null($top) ? $top : 0;
        $this->bottom = !is_null($bottom) ? $bottom : 0;
        $this->left = !is_null($left) ? $left : 0;
        $this->top = !is_null($right) ? $right : 0;
        $this->orientation = OrientationEnum::PORTRAIT;
    }

    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    public function setTop($top)
    {
        $this->top = $top;

        return $this;
    }

    public function setBottom($bottom)
    {
        $this->bottom = $bottom;

        return $this;
    }

    public function setLeft($left)
    {
        $this->left = $left;

        return $this;
    }

    public function setRight($right)
    {
        $this->right = $right;

        return $this;
    }

    public function setPortrait()
    {
        $this->orientation = OrientationEnum::PORTRAIT;

        return $this;
    }

    public function setLandscape()
    {
        $this->orientation = OrientationEnum::LANDSCAPE;

        return $this;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function getTop()
    {
        return $this->top;
    }

    public function getBottom()
    {
        return $this->bottom;
    }

    public function getLeft()
    {
        return $this->left;
    }

    public function getRight()
    {
        return $this->right;
    }

    public function getOrientation()
    {
        return $this->orientation;
    }

    public function getWidth()
    {
        if ($this->orientation != OrientationEnum::LANDSCAPE) {
            return $this->size->getHeight();
        }

        return $this->size->getWidth();
    }

    public function getHeight()
    {
        if ($this->orientation != OrientationEnum::LANDSCAPE) {
            return $this->size->getWidth();
        }

        return $this->size->getHeight();
    }

}
