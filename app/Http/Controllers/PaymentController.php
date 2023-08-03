<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Square\SquareClient;
use Square\Models\CreatePaymentRequest;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        $client = new SquareClient([
            'accessToken' => config('app.square_access_token'),
            'environment' => config('app.square_environment'),
        ]);

        $paymentRequest = new CreatePaymentRequest([
            'source_id' => $request->input('nonce'),
            'amount_money' => [
                'amount' => $request->input('amount'),
                'currency' => 'USD',
            ],
            'idempotency_key' => uniqid(),
        ]);

        try {
            $response = $client->paymentsApi->createPayment($paymentRequest);
            // Handle the payment response
            // Update your database or perform any other necessary actions based on the payment status
            return redirect()->back()->with('success', 'Payment successful!');
        } catch (\Square\Exceptions\ApiException $e) {
            // Handle API errors
            return redirect()->back()->with('error', 'Payment failed!');
        }
    }
}