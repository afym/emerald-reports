<?php
/**
 * Emerald Library
 * 
 * @package Document
 * @author Angel Ybarhuen <angel.fym@gmail.com>
 */
namespace Emerald\Document;

use Emerald\Interfaces\OutputInterface;

class Header implements OutputInterface
{
   /**
    * @var String document's version
    */
    private $version;

    public function __construct($version)
    {
        $this->version = $version;
    }

    public function out()
    {
        return "{$this->version} \n";
    }
}