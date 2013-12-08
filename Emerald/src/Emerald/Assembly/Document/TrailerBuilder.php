<?php

namespace Emerald\Assembly\Document;

use Emerald\Assembly\Document\TrailerStack;
use Emerald\Assembly\Document\Abstracts\Builder;
use Emerald\Type\TrailerSize;
use Emerald\Document\Object;

class TrailerBuilder extends Builder
{

    private $trailerStack;
    private $trailerSizeType;
    private $length;

    public function __construct(TrailerStack $trailerStack)
    {
        parent::__construct();
        $this->trailerStack = $trailerStack;
        $this->trailerSizeType = new TrailerSize();
        $this->length = 0;
    }

    public function build()
    {
        $this->buildXref();
        $this->buildXrefCounter();
        $this->buildInitialCrossRow();
        $this->buildCrossTable();
        $this->buildTrailer();
        $this->buildTrailerSize();
        $this->buildStartXref();
        $this->buildFooter();

        return $this->out;
    }

    private function buildXref()
    {
        $this->append('xref');
    }

    private function buildXrefCounter()
    {
        $this->append("0 {$this->getTotalObjects()}");
    }

    private function buildInitialCrossRow()
    {
        $this->append('0000000000 65535 f');
    }

    private function buildCrossTable()
    {
        $objects = $this->trailerStack->getObjects();

        foreach ($objects as $object) {
            $this->append($this->getCrossRowFormat($object->getNumber()));
            $this->incrementLength($object);
        }
    }

    private function buildTrailer()
    {
        $this->append('trailer');
    }

    private function buildTrailerSize()
    {
        $this->setTrailerSizeValue();
        $this->append($this->trailerSizeType->out());
    }

    private function buildStartXref()
    {
        $this->append("startxref {$this->length}");
    }

    private function buildFooter()
    {
        $this->append('%%EOF');
    }

    private function getCrossRowFormat($number)
    {
        return sprintf('%010d 00000 n ', $number);
    }

    private function incrementLength(Object $object)
    {
        $this->length += $object->getLength();
    }

    private function getTotalObjects()
    {
        return $this->trailerStack->getObjects()->count() + 1;
    }

    private function setTrailerSizeValue()
    {
        $this->trailerSizeType->setValue(array(
            's' => $this->getTotalObjects(),
            'r' => $this->trailerStack->getRootReference()->getReference(),
            'i' => $this->trailerStack->getInfoReference()->getReference(),
        ));
    }

}
