<?php

namespace Emerald\Pdf\Page;

use Emerald\Exception\PageException;
use Emerald\Constant\SizeEnum;

class Size 
{
	private $pageSize;

	public function __construct($pageSize)
	{
		$this->pageSize = $pageSize;
	}

	/**
	 *	Get the page's dimension for the document.
	 *  
	 *	@throw	PageException
	 *
	 * 	@return Dimension
	 */
	public function getDimensions()
	{
		switch ($this->pageSize) {
			case SizeEnum::A4:
				return new Dimension(595.28, 841.89);
				break;
			case SizeEnum::A3:
				return new Dimension(841.89, 1190.55);
				break;
			case SizeEnum::A5:
				return new Dimension(420.94, 595.28);
				break;
			case SizeEnum::LETTER:
				return new Dimension(612, 792);
				break;
			case SizeEnum::LEGAL:
				return new Dimension(612, 1008);
				break;
			default:
				throw new PageException("Undefined page size");
				break;
		}
	}
}