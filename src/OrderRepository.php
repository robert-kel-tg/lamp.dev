<?php

namespace Src;

use Rhumsaa\Uuid\Uuid;

class OrderRepository implements OrderRepositoryInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function nextIdentity()
    {
        return OrderId::create(
            strtoupper(Uuid::uuid4())
        );
    }

    public function add(Order $order)
    {
        $this->entityManager->persist($order);
    }

    public function remove(Order $order)
    {
        $this->entityManager->remove($order);
    }

}