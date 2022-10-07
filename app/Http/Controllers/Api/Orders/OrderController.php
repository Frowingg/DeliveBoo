<?php

namespace App\Http\Controllers\Api\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Braintree\Gateway;
use App\Http\Requests\Orders\OrderRequest;
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

    public function makePayment(Request $request, Gateway $gateway) {

        $result = $gateway->transaction()->sale([
            'amount' => $request->price,
            'paymentMethodNonce' => $request->token,
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
}
