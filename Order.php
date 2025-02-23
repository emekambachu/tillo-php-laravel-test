<?php

class Order {
    private $orders;

    /**
     * @throws JsonException
     */
    public function __construct() {
        $this->orders = json_decode(file_get_contents(__DIR__ . '/' . 'orders.json'), true, 512, JSON_THROW_ON_ERROR);
    }

    public function getOrders(): array
    {
        if(empty($this->orders)) {
            throw new \RuntimeException('No orders found');
        }
        return $this->orders;
    }

    public function countTotalOrders($orders): int
    {
        return count($orders);
    }

    public function countFreeOrders($orders): int
    {
        return count(array_filter($orders, function($order) {
            return isset($order['price']) && $order['price'] === "0.00";
        }));
    }

    public function countOrdersInGBP($orders): int
    {
        return count(array_filter($orders, function($order) {
            return isset($order['currency']) && $order['currency'] === "GBP";
        }));
    }

    public function countOrdersShippedToEssex($orders): int
    {
        return count(array_filter($orders, function($order) {
            return isset($order['customer']['shipping_address']['county']) && $order['customer']['shipping_address']['county'] === "Essex";
        }));
    }

    public function sumOrdersInGBPAndAbove100($orders): float
    {
        return array_reduce($orders, function($carry, $order) {
            if(isset($order['currency'], $order['price']) && $order['currency'] === "GBP" && (float)$order['price'] >= 100.0) {
                return $carry + (float)$order['price'];
            }
            return $carry;
        }, 0.0);
    }

    public function sumOrdersInGBP($orders): float
    {
        return array_reduce($orders, function($carry, $order) {
            if (isset($order['currency'], $order['price']) && $order['currency'] === "GBP") {
                return $carry + (float)$order['price'];
            }
            return $carry;
        }, 0.0);
    }

    public function sumOrdersInGBPAndShippedToEssex($orders): float
    {
        return array_reduce($orders, function($carry, $order) {

            if(isset($order['currency'], $order['price'], $order['customer']['shipping_address']['county']) && $order['currency'] === "GBP" && $order['customer']['shipping_address']['county'] === "Essex") {
                return $carry + (float)$order['price'];
            }

            return $carry;
        }, 0.0);
    }
}
