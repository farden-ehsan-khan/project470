<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Models\Cart;

class CartTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_cart_payment()
    {
        $cart = new Cart;
        $cart->payment_status = "unpaid";
        $this->assertEquals($cart->payment_status,"unpaid");

    }

    public function test_cart_delivery()
    {
        $cart = new Cart;
        $cart->delivery_status = "processing";
        $this->assertEquals($cart->delivery_status,"processing");

    }

    public function test_cart_id()
    {
        $cart = new Cart;
        $cart->id = 100;
        $this->assertEquals($cart->id,100);
    }

}
