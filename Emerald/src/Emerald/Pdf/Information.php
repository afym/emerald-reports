<?php

namespace Emerald\Pdf;

class Information
{

    private $title;
    private $subject;
    private $author;
    private $keyWords;
    private $creator;

    public function __construct()
    {
        $this->title = 'Emerald PDF';
        $this->subject = 'Emerald Report';
        $this->author = 'By Emerald';
        $this->keyWords = 'emeralad, php, library';
        $this->creator = 'By Emerald';
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function getKeyWords()
    {
        return $this->keyWords;
    }

    public function getCreator()
    {
        return $this->creator;
    }

    public function getDate()
    {
        return (new \DateTime('NOW'))->format('Ymdhis');
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    public function setKeyWords($keyWords)
    {
        $this->keyWords = $keyWords;

        return $this;
    }

    public function setCreator($creator)
    {
        $this->creator = $creator;

        return $this;
    }

}
