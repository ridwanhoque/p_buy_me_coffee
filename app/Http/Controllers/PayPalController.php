<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class PayPalController extends Controller
{

    protected $provider;

    // public function __construct(ExpressCheckout $provider){
    //     $this->provider = $provider;
    // }

    public function payment(){
        $data = [];

        $data['items'] = [
            [
                'name' => 'Ridwan',
                'price' => 150,
                'qty' => 10,
                'desc' => 'Details here'
            ]
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "order details";
        $data['return_url'] = route('payment.success');
        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = 100;
        $p = new ExpressCheckout;
        $response = $p->setExpressCheckout($data, true);

        return redirect($response['paypal_link']);

        

    }   

    public function cancel(){
        return abort(403);
    }

    public function success(Request $request){
        $response = $this->provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Your payment was successful. You can create success page here.');
        }
  
        dd('Something is wrong.');

    } 

}
