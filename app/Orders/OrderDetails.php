<?php

namespace App\Orders;

use App\Billing\PaymentGatewayContract;

class OrderDetails{

    private $payment_gateway;

    public function __construct(PaymentGatewayContract $payment_gateway)
    {
        $this->payment_gateway = $payment_gateway;
    }

    public function all(){

        $this->payment_gateway->setDiscount(200);

        return [
            'name' => 'Ridwan',
            'address' => 'Dhaka',
            'order_number' => 456225
        ];
    }
}