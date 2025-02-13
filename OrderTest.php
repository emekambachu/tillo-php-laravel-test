<?php

use PHPUnit\Framework\TestCase;
require __DIR__ . '/Order.php';

class OrderTest extends TestCase {

    private array $orders;

    protected function setUp(): void {
        // Sample orders array to test
        $this->orders = [
            [
                "currency" => "GBP",
                "price" => "50.00",
                "customer" => [
                    "shipping_address" => ["county" => "Essex"]
                ]
            ],
            [
                "currency" => "USD",
                "price" => "100.00",
                "customer" => [
                    "shipping_address" => ["county" => "Essex"]
                ]
            ],
            [
                "currency" => "GBP",
                "price" => "200.00",
                "customer" => [
                    "shipping_address" => ["county" => "Essex"]
                ]
            ],
            [
                "currency" => "GBP",
                "price" => "150.00",
                "customer" => [
                    "shipping_address" => ["county" => "London"]
                ]
            ],
            [
                "currency" => "GBP",
                "price" => "0.00",
                "customer" => [
                    "shipping_address" => ["county" => "Essex"]
                ]
            ]
        ];

    }

    public function testCountTotalOrders(): void
    {
        $order = new Order();
        $this->assertGreaterThanOrEqual(0, $order->countTotalOrders($this->orders));
        $this->assertEquals(count($this->orders), $order->countTotalOrders($this->orders));
    }

    public function testCountFreeOrders(): void
    {
        $order = new Order();
        $this->assertEquals(1, $order->countFreeOrders($this->orders));
    }

    public function testCountOrdersInGBP(): void
    {
        $order = new Order();
        $this->assertEquals(4, $order->countOrdersInGBP($this->orders));
    }

    public function testCountOrdersShippedToEssex(): void
    {
        $order = new Order();
        $this->assertEquals(4, $order->countOrdersShippedToEssex($this->orders));
    }

    public function testSumOrdersInGBPAndAbove100(): void
    {
        $order = new Order();
        $this->assertGreaterThanOrEqual(100, $order->sumOrdersInGBPAndAbove100($this->orders));
        $this->assertEquals(350.00, $order->sumOrdersInGBPAndAbove100($this->orders));
    }

    public function testSumOrdersInGBP(): void
    {
        $order = new Order();
        $this->assertEquals(400.00, $order->sumOrdersInGBP($this->orders));
    }

    public function testSumOrdersInGBPAndShippedToEssex(): void
    {
        $order = new Order();
        $this->assertEquals(250.00, $order->sumOrdersInGBPAndShippedToEssex($this->orders));
    }
}
