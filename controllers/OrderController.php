<?php

namespace controllers;
require_once __DIR__ . '/../services/Order.php';

use services\Order;

class OrderController
{
    protected Order $orders;
    public function __construct()
    {
        $this->orders = new Order();
    }

    public function displayOrders(): array
    {
        return [
            'countFreeOrders' => $this->orders->countFreeOrders($this->orders->getOrders()),
            'countOrdersInGBP' => $this->orders->countOrdersInGBP($this->orders->getOrders()),
            'countOrdersShippedToEssex' => $this->orders->countOrdersShippedToEssex($this->orders->getOrders()),
            'totalOrdersInGBPAndAbove100' => $this->orders->sumOrdersInGBPAndAbove100($this->orders->getOrders()),
            'totalOrdersInGBP' => $this->orders->sumOrdersInGBP($this->orders->getOrders()),
            'totalOrdersInGBPAndShippedToEssex' => $this->orders->sumOrdersInGBPAndShippedToEssex($this->orders->getOrders())
        ];
    }

}