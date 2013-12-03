<?php

namespace Emerald\Assembly\Document;

use Emerald\Assembly\Document\TrailerStack;
use Emerald\Assembly\Document\Abstracts\Builder;

class TrailerBuilder extends Builder
{
    public function build()
    {
      return $this->out;
    }
}
