<?php
namespace Src;

class CustomFactoryRepository implements UserFactoryRepositoryInterface
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $userRepository->add(new User('John Doe', new Money(195.50, new Currency('EUR', new Rate(1.1))), new \DateTime('1983-12-18')));
        $userRepository->add(new User('Example Guy2', new Money(109.23, new Currency('EUR', new Rate(1.1))), new \DateTime('1989-11-15')));
        $userRepository->add(new User('Example Guy14', new Money(0.80, new Currency('EUR', new Rate(1.1))), new \DateTime('1990-05-06')));

        $this->userRepository = $userRepository;
    }

    public function getUserRepository()
    {
        return $this->userRepository;
    }
}