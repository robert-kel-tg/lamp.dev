<?php

namespace Src;

class EntityManager implements EntityManagerInterface
{
    public function persist(Order $order)
    {
        print 'Persisted';
    }

    public function remove(Order $order)
    {
        print 'Removed';
    }

}