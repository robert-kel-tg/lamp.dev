<?php
namespace Src;

class Currency
{
    private $name;

    private $rate;

    function __construct($name, Rate $rate)
    {
        $this->name = $name;
        $this->rate = $rate;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getRate()
    {
        return $this->rate;
    }
}