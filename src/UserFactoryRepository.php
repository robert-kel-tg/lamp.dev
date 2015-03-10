<?php
namespace Src;

class UserFactoryRepository implements UserFactoryRepositoryInterface
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $userRepository->add(new User('John Doe', new Money(195.50, new Currency('EUR', new Rate(1.1))), new \DateTime('1983-12-18')));
        $userRepository->add(new User('Example Guy2', new Money(109.23, new Currency('EUR', new Rate(1.1))), new \DateTime('1989-11-15')));
        $userRepository->add(new User('Example Guy14', new Money(0.80, new Currency('EUR', new Rate(1.1))), new \DateTime('1990-05-06')));
        $userRepository->add(new User('Example Guy15', new Money(0.90, new Currency('EUR', new Rate(1.1))), new \DateTime('1993-01-01')));
        $userRepository->add(new User('Example Guy12', new Money(8.23, new Currency('EUR', new Rate(1.1))), new \DateTime('1991-02-12')));
        $userRepository->add(new User('Example Guy1', new Money(2, new Currency('EUR', new Rate(1.1))), new \DateTime('1995-09-17')));
        $userRepository->add(new User('Example Guy', new Money(56.87, new Currency('EUR', new Rate(1.1))), new \DateTime('1991-12-19')));
        $userRepository->add(new User('Foo Bar', new Money(1005.56, new Currency('EUR', new Rate(1.1))), new \DateTime('1986-08-18')));
        $this->userRepository = $userRepository;
    }

    public function getUserRepository()
    {
        return $this->userRepository;
    }
}