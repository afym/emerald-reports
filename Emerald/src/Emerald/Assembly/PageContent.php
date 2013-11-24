<?php

namespace Emerald\Assembly;

use Emerald\Document\Object;
use Emerald\Pdf\Element;
use Emerald\Type\Length;
use Emerald\Type\Page;
use Emerald\Type\ParentType;
use Emerald\Type\Resources;
use Emerald\Type\Contents;
use Emerald\Interfaces\OutputInterface;

class PageContent implements OutputInterface
{

    private $page;
    private $content;
    private $elements;
    private $pageType;
    private $parent;
    private $contentType;
    private $resources;

    public function __construct(Object $page, Object $content)
    {
        $this->page = $page;
        $this->content = $content;
        $this->elements = new \ArrayObject();
    }

    public function setParentType(Object $parent)
    {
        $this->parent = new ParentType();
        $this->parent->setValue(array('p' => $parent->getReference()));

        return $this;
    }

    private function setContent()
    {
        $this->contentType = new Contents();
        $this->contentType->setValue(array('c' => $this->content->getReference()));

        return $this;
    }

    public function setResources(Object $resources)
    {
        $this->resources = new Resources();
        $this->resources->setValue(array('r' => $resources->getReference()));

        return $this;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function addElement(Element $element)
    {
        $this->elements->append($element);

        return $this;
    }

    public function out()
    {
        $this->setContent()->setPageType()->setPageContent();

        return " {$this->page->out()} {$this->content->out()} ";
    }

    private function setPageType()
    {
        $this->pageType = new Page();

        $value = array(
            'p' => $this->parent->out(),
            'r' => $this->resources->out(),
            'c' => $this->contentType->out(),
        );

        $this->pageType->setValue($value);

        $this->page->setContent($this->pageType->out());

        return $this;
    }

    private function setPageContent()
    {
        $lenght = new Length();
        $out = '';

        foreach ($this->elements as $element) {
            $out .= $element->toString() . "\n";
        }

        $lenght->setValue(array('l' => strlen($out)));

        $content = "{$lenght->out()} {$out}";

        $this->content->setContent($content);

        return $this;
    }

}