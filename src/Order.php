<?php

namespace Src;

use Rhumsaa\Uuid\Uuid;

class Order
{
    private $id;
    private $amount;
    private $firstName;
    private $lastName;

    public function __construct(OrderId $anOrderId, $amount, $aFirstName, $aLastName) {
        $this->id = $anOrderId;
        $this->amount = $amount;
        $this->firstName = $aFirstName;
        $this->lastName = $aLastName;
    }

    public function id()
    {
        return $this->id;
    }

    public function firstName()
    {
        return $this->firstName;
    }

    public function lastName()
    {
        return $this->lastName;
    }

    public function amount()
    {
        return $this->amount;
    }
}