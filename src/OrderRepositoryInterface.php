<?php

namespace Src;

interface OrderRepositoryInterface {

    public function nextIdentity();

    public function add(Order $order);

    public function remove(Order $order);
}