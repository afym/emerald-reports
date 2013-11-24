<?php

namespace Emerald\Assembly;

use Emerald\Interfaces\OutputInterface;

class DocumentBody implements OutputInterface
{

    private $pagesContent;
    private $out;

    public function __construct(\ArrayObject $pagesContent)
    {
        $this->pagesContent = $pagesContent;
        $this->out = '';
    }

    public function out()
    {
        $this->getPagesContentOut();

        return $this->out;
    }

    private function getPagesContentOut()
    {
        foreach ($this->pagesContent as $pageContent) {
            $this->out .= $pageContent->out();
        }
    }

}