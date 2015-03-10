<?php
namespace Src;

require_once '../vendor/autoload.php';

use Src;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class UserCase
{
    private $userRepository;

    public function __construct(UserFactoryRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserFactoryRepository()
    {
        return $this->userRepository;
    }

    public function getRepository()
    {
        return $this->getUserFactoryRepository()->getUserRepository();
    }

    public function showSum(ControllerInterface $controller)
    {
        return $controller->total($this->getRepository());
    }

    public function makeSomeActions(ControllerInterface $controller)
    {
//        $getUserByKey = $controller->getUserByKey(3, $this->getRepository());

        $controller->setList($this->getRepository()->getList());
        $controller->sort(new BirthDateComparator());

        $iterator = $controller->filterUsersBy(new AgeRangeFilterIterator(10, 80, $this->getRepository()->getIterator()));
        $controller->filterUsersBy(new BirthDateRangeFilterIterator(new \DateTime('1990-01-01'), new \DateTime('1993-02-02'), $iterator));
        $controller->sort(new AscAgeNumericComparator());
    }
}


########################################################################################################################
$container = new ContainerBuilder();
$container->register('user_repository', 'Src\UserRepository');

$container
    ->register('user_factory_repository', 'Src\UserFactoryRepository')
    ->addArgument(new Reference('user_repository'));

$container
    ->register('user_case', 'Src\UserCase')
    ->addArgument(new Reference('user_factory_repository'));

$container
    ->register('controller', 'Src\Controller');
########################################################################################################################
try {

    $user_case = $container->get('user_case');
    $controller = $container->get('controller');
    $user_factory_repository = $container->get('user_factory_repository');

    $user_case->makeSomeActions($controller);

    echo '<pre>';
    print_r($user_case->showSum($controller));
    echo '</pre>';

} catch (\InvalidArgumentException $e) {
    print_r($e->getMessage());
} catch (\Exception $e) {
    echo '<pre>';
    die(print_r($e->getMessage()));
    echo '</pre>';
}