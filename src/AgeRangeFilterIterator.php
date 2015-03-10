<?php
namespace Src;

class AgeRangeFilterIterator extends \FilterIterator
{
    private $from = 0;

    private $to = 0;

    function __construct($from, $to, \Iterator $iterator)
    {
        parent::__construct($iterator);

        if($from > $to) {
            throw new \OutOfBoundsException(sprintf("from: (%s) can't be bigger than to: (%s)\n", $from, $to));
        }

        $this->from = $from;
        $this->to = $to;
    }

    public function accept()
    {
        return ($this->current()->getAge() >= $this->from) && ($this->current()->getAge() <= $this->to);
    }
}