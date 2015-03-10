<?php
namespace Src;

class UserRepository implements UserRepositoryInterface
{
    private $list;

    public function add(User $user)
    {
        $this->list[] = $user;
    }

    public function getList()
    {
        return $this->list;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->list);
    }

    public function getUserByKey($uid)
    {
        $iterator = $this->getIterator();

        $iterator->rewind();
        while($iterator->valid()) {

            if($iterator->key() === $uid) {
                return $iterator->current();
            }

            $iterator->next();
        }
    }

    public function total()
    {
        $iterator = $this->getIterator();

        $total = 0.0;

        $iterator->rewind();
        while($iterator->valid()) {

            $total += $iterator->current()->getMoneyAmount();

            $iterator->next();
        }
        return $total;
    }
}