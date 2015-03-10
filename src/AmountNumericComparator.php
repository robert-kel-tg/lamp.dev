<?php
namespace Src;

class AmountNumericComparator implements ComparatorInterface
{
    public function compare($a, $b)
    {
        return $a->getMoneyAmount() > $b->getMoneyAmount();
    }
}