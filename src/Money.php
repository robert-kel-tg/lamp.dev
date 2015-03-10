<?php
namespace Src;

class Money
{
    private $value;

    private $currency;

    function __construct($value, Currency $currency)
    {
        $this->value = $value;
        $this->currency = $currency;
    }

    public function getValue()
    {
        return $this->value;
    }
}