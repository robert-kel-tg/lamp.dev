<?php

namespace Tests;

require_once './vendor/autoload.php';

use Src\Currency;
use Src\Money;
use Src\Rate;
use Src\User;
use Src\UserStatus;


class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testUserConstructor()
    {
        $user1 = new User('Petras', new Money(8, new Currency('EUR', new Rate(1))), new \DateTime('2015-01-01'));
        $user2 = new User('Petras', new Money(8, new Currency('EUR', new Rate(1))), new \DateTime('2015-01-01'));
        $this->assertEquals($user1, $user2);
    }

    public function testUserStatus()
    {
        $user = new User('Petras', new Money(8, new Currency('EUR', new Rate(1))), new \DateTime('2015-01-01'));
        $user->setStatus(new UserStatus(UserStatus::PUBLISHED));
        $this->assertEquals(0x10, $user->getStatus());
    }

    public function testUserSetMoney()
    {
        $user = new User('Petras', new Money(8, new Currency('EUR', new Rate(1))), new \DateTime('2015-01-01'));
        $this->assertEquals(8, $user->getMoneyAmount());
    }

    public function testUserName()
    {
        $user = new User('Petras', new Money(8, new Currency('EUR', new Rate(1))), new \DateTime('2015-01-01'));
        $this->assertEquals('Petras', $user->getName());
    }

    public function testUserBirthDate()
    {
        $user = new User('Petras', new Money(8, new Currency('EUR', new Rate(1))), new \DateTime('2015-01-01'));
        $this->assertEquals('2015-01-01', $user->getBirthDate());
    }

    public function testUserAge()
    {
        $user = new User('Petras', new Money(8, new Currency('EUR', new Rate(1))), new \DateTime('1993-01-01'));
        $this->assertEquals(22, $user->getAge());
    }
}