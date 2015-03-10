<?php

namespace Src;

class OrderId
{
    private $id;

    private function __construct($anId) {
        $this->id = $anId;
    }

    public static function create($anId) {
        return new static($anId);
    }
}