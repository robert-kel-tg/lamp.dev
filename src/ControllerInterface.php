<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 2015-03-04
 * Time: 13:08
 */
namespace Src;

interface ControllerInterface
{
    public function setList($list);

    public function getList();

    public function sort(ComparatorInterface $comparator);

    public function total(UserRepository $userRepository);

    public function getUserByKey($uid, UserRepositoryInterface $userRepository);

    public function filterUsersBy(\FilterIterator $iterator);
}