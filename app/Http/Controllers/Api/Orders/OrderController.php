<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Http\Requests\Orders\OrderRequest;
use App\Order;
// use App\Admin\Dish;

class OrderController extends Controller
{
    public function generate(Request $request, Gateway $gateway) {
        $token= $gateway->clientToken()->generate();

        $data= [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }

    public function makePayment(OrderRequest $request, Gateway $gateway) {

        $result = $gateway->transaction()->sale([
            'amount' => $request->price,
            'paymentMethodNonce' => 'fake-valid-nonce',
            'options' =>[
                'submitForSettlement'=> true
            ]
        ]);
        if($result->success){
            $data= [
                'success' => true,
                'message' => 'Transazione esegita con successo'
            ];

            return response()->json($data, 200);
        }else{
            $data= [
                'success' => false,
                'message' => 'Transazione FALLITA'
            ];

            return response()->json($data, 401);
        }
    }

    public function store(Request $request) {

        $data = $request->all();

        $response = Order::create($data);

        return response()->json([
            'success' => true,
            'result' => $response
        ], 200);
    }
}
