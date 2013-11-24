<?php

namespace Emerald\Pdf\Page;

use Emerald\Constant\SizeEnum;
use Emerald\Constant\OrientationEnum;

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

	public function __construct(Size $size = null, $top = null, $bottom = null, $left = null, $right = null)
	{
		$this->size = !is_null($size) ? $size : new Size(SizeEnum::A4);
		$this->top = !is_null($top) ? $top : 5;
		$this->bottom = !is_null($bottom) ? $bottom : 5;
		$this->left = !is_null($left) ? $left : 5;
		$this->top = !is_null($right) ? $right : 5;
		$this->orientation = OrientationEnum::PORTRAIT;
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

	public function getSize()
	{
		return $this->size;
	}
}