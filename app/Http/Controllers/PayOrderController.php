<?php

namespace App\Http\Controllers;

use App\Orders\OrderDetails;
use App\Billing\PaymentGatewayContract;

class PayOrderController extends Controller
{
    public function store(OrderDetails $orderDetails, PaymentGatewayContract $payment_gateway){

        // $payment_gateway = new PaymentGateway();
        $order = $orderDetails->all();

        dd($payment_gateway->charge(500));

    }

}
