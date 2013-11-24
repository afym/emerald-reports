<?php

namespace Emerald\Pdf\Text;

use Emerald\Pdf\Element;

class Paragraph implements Element
{
	private $content;

	public function __construct($content)
	{
		$this->content = $content;
	}
}