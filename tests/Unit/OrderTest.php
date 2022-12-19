<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Models\Order;

class OrderTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_order_payment()
    {
        $order = new Order;
        $order->payment_status = "unpaid";
        $this->assertEquals($order->payment_status,"unpaid");

    }

    public function test_order_delivery()
    {
        $order = new Order;
        $order->delivery_status = "processing";
        $this->assertEquals($order->delivery_status,"processing");

    }

    public function test_order_id()
    {
        $order = new Order;
        $order->id = 100;
        $this->assertEquals($order->id,100);
    }

}
