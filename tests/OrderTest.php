<?php

use PHPUnit\Framework\TestCase;
use services\Order;

require __DIR__ . '/../services/Order.php';

class OrderTest extends TestCase {

    private array $orders;
    private Order $order;

    protected function setUp(): void {
        $this->order = new Order();
        // Sample orders array to test
        $this->orders = [
            [
                "currency" => "GBP",
                "price" => "50.00",
                "customer" => [
                    "shipping_address" => [
                        "county" => "Essex"
                    ]
                ]
            ],
            [
                "currency" => "USD",
                "price" => "100.00",
                "customer" => [
                    "shipping_address" => [
                        "county" => "Essex"
                    ]
                ]
            ],
            [
                "currency" => "GBP",
                "price" => "200.00",
                "customer" => [
                    "shipping_address" => [
                        "county" => "Essex"
                    ]
                ]
            ],
            [
                "currency" => "GBP",
                "price" => "150.00",
                "customer" => [
                    "shipping_address" => [
                        "county" => "London"
                    ]
                ]
            ],
            [
                "currency" => "GBP",
                "price" => "0.00",
                "customer" => [
                    "shipping_address" => [
                        "county" => "Essex"
                    ]
                ]
            ]
        ];

    }

    public function testCountTotalOrders(): void
    {
        $this->assertGreaterThanOrEqual(0, $this->order->countTotalOrders($this->orders));
        $this->assertEquals(count($this->orders), $this->order->countTotalOrders($this->orders));
    }

    public function testCountFreeOrders(): void
    {
        $this->assertEquals(1, $this->order->countFreeOrders($this->orders));
    }

    public function testCountOrdersInGBP(): void
    {
        $this->assertEquals(4, $this->order->countOrdersInGBP($this->orders));
    }

    public function testCountOrdersShippedToEssex(): void
    {
        $this->assertEquals(4, $this->order->countOrdersShippedToEssex($this->orders));
    }

    public function testSumOrdersInGBPAndAbove100(): void
    {
        $this->assertGreaterThanOrEqual(100, $this->order->sumOrdersInGBPAndAbove100($this->orders));
        $this->assertEquals(350.00, $this->order->sumOrdersInGBPAndAbove100($this->orders));
    }

    public function testSumOrdersInGBP(): void
    {
        $this->assertEquals(400.00, $this->order->sumOrdersInGBP($this->orders));
    }

    public function testSumOrdersInGBPAndShippedToEssex(): void
    {
        $this->assertEquals(250.00, $this->order->sumOrdersInGBPAndShippedToEssex($this->orders));
    }

    public function testOrderIsNotEmpty(): void
    {
        $this->assertNotEmpty($this->order->getOrders());
    }
}
