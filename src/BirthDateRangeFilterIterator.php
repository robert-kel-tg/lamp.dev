<?php
namespace Src;

class BirthDateRangeFilterIterator extends \FilterIterator
{
    private $from = 0;

    private $to = 0;

    function __construct(\DateTime $from, \DateTime $to, \Iterator $iterator)
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
        return ($this->current()->getBirthDate() >= $this->from->format('Y-m-d')) && ($this->current()->getBirthDate() <= $this->to->format('Y-m-d'));
    }
}