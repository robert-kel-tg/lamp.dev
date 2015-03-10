<?php
namespace Src;

class Controller implements ControllerInterface
{

    private $list;

    public function setList($list)
    {
        $this->list = $list;
    }

    public function getList()
    {
        return $this->list;
    }

    public function sort(ComparatorInterface $comparator)
    {
        $callback = array($comparator, 'compare');
        uasort($this->list, $callback);
    }

    public function total(UserRepository $userRepository)
    {
        return $userRepository->total();
    }

    public function getUserByKey($uid, UserRepositoryInterface $userRepository)
    {
        return $userRepository->getUserByKey($uid);
    }

    public function filterUsersBy(\FilterIterator $iterator)
    {
        $users = array();
        $iterator->rewind();
        while($iterator->valid()) {

            $users[$iterator->key()] = $iterator->current();

            $iterator->next();
        }
        $this->setList($users);
        return $iterator;
    }

//    public function getUserWith($comparator)
//    {
//        $callback = array($comparator, 'compare');
//        uasort($this->list, $callback);
//
//        return reset($this->list);
//    }
}