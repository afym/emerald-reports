<?php

namespace Emerald\Assembly\Document;

use Emerald\Assembly\Document\HeaderStack;
use Emerald\Assembly\Document\PageStack;
use Emerald\Assembly\Document\Abstracts\Builder;
use Emerald\Assembly\Document\HeaderBuilder;
use Emerald\Assembly\Document\PageBuilder;

class MainBuilder extends Builder
{

    private $headerBuiler;
    private $pageBuilder;

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

    public function build()
    {
        $this->append($this->headerBuiler->build());

        return $this->out;
    }

}
