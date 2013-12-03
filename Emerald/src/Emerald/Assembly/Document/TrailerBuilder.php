<?php

namespace Emerald\Assembly\Document;

use Emerald\Assembly\Document\TrailerStack;
use Emerald\Assembly\Document\Abstracts\Builder;

class TrailerBuilder extends Builder
{
    private $trailerStack;

    public function __construct(TrailerStack $trailerStack)
    {
        parent::__construct();
        $this->trailerStack = $trailerStack;        
    }

    public function build()
    {
      return $this->out;
    }
}
