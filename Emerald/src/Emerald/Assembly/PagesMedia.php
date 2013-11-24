<?php

namespace Emerald\Assembly;

use Emerald\Document\Object;
use Emerald\Interfaces\OutputInterface;
use Emerald\Pdf\Page\Format;
use Emerald\Type\Pages;
use Emerald\Type\Count;
use Emerald\Type\Kids;
use Emerald\Type\MediaBox;

class PagesMedia implements OutputInterface
{

    /**
     * @var Object Document's initial pages object
     */
    private $pagesObject;

    /**
     * @var Pages PagesMedia's pages pdf type
     */
    private $pages;

    /**
     * @var Format Document's format
     */
    private $format;

    /**
     * @var ArrayObject<Object> Document's total pages
     */
    private $totalPages;

    /**
     * @var Count PagesMedia's count pdf type
     */
    private $count;

    /**
     * @var Pages PagesMedia's kids pdf type
     */
    private $kids;

    /**
     * @var Pages PagesMedia's mediabox pdf type
     */
    private $mediabox;

    /**
     * Default constructor
     *
     * @var Object Document's initial pages object
     * @var Format Document's format
     */
    public function __construct(Object $pagesObject, Format $format)
    {
        $this->pagesObject = $pagesObject;
        $this->format = $format;
    }

    /**
     * @var ArrayObject<PageContent> Document's total pages only
     *
     * @return PagesMedia
     */
    public function setTotalPages(\ArrayObject $totalPages)
    {
        $this->totalPages = $totalPages;

        return $this;
    }

    /**
     * Returns the complete page's media configuration
     *
     * @return String 
     */
    public function out()
    {
        $this->setCount()->setKids()->setMediaBox()->setPages();

        return $this->pagesObject->out();
    }

    /**
     * Begins count type object
     * 
     * @return void
     */
    private function setCount()
    {
        $this->count = new Count();
        $this->count->setValue(array('c' => $this->totalPages->count()));

        return $this;
    }

    /**
     * Begins kids type object
     * 
     * @return void
     */
    private function setKids()
    {
        $value = array();

        foreach ($this->totalPages as $pageContent) {
            $value[] = $pageContent->getPage()->getReference();
        }

        $this->kids = new Kids();
        $this->kids->setValue($value);

        return $this;
    }

    /**
     * Begins mediabox type object
     * 
     * @return void
     */
    private function setMediaBox()
    {
        $value = array(
            'w' => $this->format->getSize()->getDimensions()->getWidth(),
            'h' => $this->format->getSize()->getDimensions()->getHeight(),
        );

        $this->mediabox = new MediaBox();
        $this->mediabox->setValue($value);

        return $this;
    }

    /**
     * Begins pages type object
     * 
     * @return void
     */
    private function setPages()
    {
        $this->pages = new Pages();

        $value = array(
            'k' => $this->kids->out(),
            'c' => $this->count->out(),
            'm' => $this->mediabox->out(),
        );

        $this->pages->setValue($value);

        $this->pagesObject->setContent($this->pages->out());

        return $this;
    }

}