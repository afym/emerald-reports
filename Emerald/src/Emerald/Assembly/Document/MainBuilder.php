<?php

namespace Emerald\Assembly\Document;

use Emerald\Assembly\Document\HeaderStack;
use Emerald\Assembly\Document\PageStack;
use Emerald\Assembly\Document\TrailerStack;
use Emerald\Assembly\Resource\ResourceStack;
use Emerald\Assembly\Document\Abstracts\Builder;
use Emerald\Assembly\Document\HeaderBuilder;
use Emerald\Assembly\Document\PageBuilder;
use Emerald\Assembly\Document\TrailerBuilder;
use Emerald\Assembly\Resource\ResourceBuilder;

class MainBuilder extends Builder
{

    private $headerBuiler;
    private $pageBuilder;
    private $trailerBuilder;
    private $resourceBuilder;

    public function __construct()
    {
        parent::__construct();
    }

    public function setHeaderStack(HeaderStack $stack)
    {
        $this->headerBuiler = new HeaderBuilder($stack);
        return $this;
    }

    public function setPageStack(PageStack $stack)
    {
        $this->pageBuilder = new PageBuilder($stack);
        return $this;
    }

    public function setTrailerStack(TrailerStack $stack)
    {
        $this->trailerBuilder = new TrailerBuilder($stack);
        return $this;
    }

    public function setResourceStack(ResourceStack $stack)
    {
        $this->resourceBuilder = new ResourceBuilder($stack);
        return $this;
    }

    public function build()
    {
        $this->append($this->headerBuiler->build());
        $this->append($this->pageBuilder->build());
        $this->append($this->resourceBuilder->build());
        $this->append($this->trailerBuilder->build());
        return $this->out;
    }

}
