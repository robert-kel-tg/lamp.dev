<?php
namespace Src;

interface UserRepositoryInterface extends \IteratorAggregate
{
    public function add(User $user);

    public function getList();
}