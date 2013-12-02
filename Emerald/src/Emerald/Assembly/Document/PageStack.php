<?php

namespace Emerald\Assembly\Document;

use Emerald\Document\Object;
use Emerald\Pdf\Page\Format;
use Emerald\Interfaces\Pdf\Element;
use Emerald\Assembly\Document\Abstracts\Stack;

class PageStack extends Stack
{

    private $contentKey;
    private $pagesReference;
    private $pagesContent;
    private $pagesElements;
    private $parentReference;
    private $resourcesReference;

    public function __construct(Format $format)
    {
        parent::__construct($format);

        $this->pagesReference = new \ArrayObject();
        $this->pagesContent = new \ArrayObject();
        $this->pagesElements = new \ArrayObject();
    }

    public function setParentReference(Object $reference)
    {
        $this->parentReference = $reference;
        return $this;
    }

    public function setResourcesReference(Object $reference)
    {
        $this->resourcesReference = $reference;
        return $this;
    }

    public function appendPageReference(Object $reference)
    {
        $this->pagesReference->append($reference);
        return $this;
    }

    public function appendPageContent(Object $content)
    {
        $this->pagesContent->append($content);
        $this->contentKey = $content->getReference();
        $this->pagesElements->offsetSet($this->contentKey, new \ArrayObject());
        return $this;
    }

    public function appendElement(Element $element)
    {
        $this->pagesElements->offsetGet($this->contentKey)->append($element);
        return $this;
    }

    /**
     * @return ArrayObject<Object> Pages references
     */
    public function getPagesReference()
    {
        return $this->pagesReference;
    }

    /**
     * @return ArrayObject<Object> Pages contents
     */
    public function getPagesContent()
    {
        return $this->pagesContent;
    }

    /**
     * @return ArrayObject<Element> Pages elements
     */
    public function getPagesElement()
    {
        return $this->pagesElements;
    }

    /**
     * @return Object  Resources
     */
    public function getResourcesReference()
    {
        return $this->resourcesReference;
    }

    /**
     * @return Object Page
     */
    public function getParentReference()
    {
        return $this->parentReference;
    }

}
