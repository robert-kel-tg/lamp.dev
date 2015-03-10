<?php
namespace Src;

class UserStatus
{
    const PUBLISHED = 0x10;
    const UNPUBLISHED = 0x11;

    private $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function getType()
    {
        return $this->type;
    }
}