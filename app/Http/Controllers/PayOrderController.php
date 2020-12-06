<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGateway;
use Faker\Provider\ar_SA\Payment;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{
    public function store(PaymentGateway $payment_gateway){

        // $payment_gateway = new PaymentGateway();

        dd($payment_gateway->charge(500));

    }

}
