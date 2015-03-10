<?php
namespace Src;

class BirthDateComparator implements ComparatorInterface
{
    public function compare($a, $b)
    {
        return $a->getBirthDate() > $b->getBirthDate();
    }
}