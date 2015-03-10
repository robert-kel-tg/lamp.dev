<?php

namespace Src;

interface EntityManagerInterface {

    public function persist(Order $order);

    public function remove(Order $order);
}