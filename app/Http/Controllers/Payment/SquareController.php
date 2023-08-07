<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Payment\SquareLoacationInfo;
use Config;
use Illuminate\Http\Request;

use Square\Environment;
use Ramsey\Uuid\Uuid;

use Square\SquareClient;
use Square\Models\Money;
use Square\Models\CreatePaymentRequest;
use Square\Exceptions\ApiException;

class SquareController extends Controller
{
    //

    public function index()
    {
        // Pulled from the .env file and upper cased e.g. SANDBOX, PRODUCTION.
        $upper_case_environment = Config::get('square.environment');

        $square_environment = strtolower(Config::get('square.environment'));
        $web_payment_sdk_url = $square_environment === Environment::PRODUCTION ? "https://web.squarecdn.com/v1/square.js" : "https://sandbox.web.squarecdn.com/v1/square.js";
        $location_info = new SquareLoacationInfo();
        $idempotencyKey = Uuid::uuid4();

        return view('payment.square.index', compact('web_payment_sdk_url', 'location_info', 'idempotencyKey'));

    }

    public function process_payment(Request $request)
    {

        $token = $request->token;
        $idempotencyKey = $request->idempotencyKey;
        $square_client = new SquareClient([
            'accessToken' => Config::get('square.access_token'),
            'environment' => Config::get('square.environment'),
            'userAgentDetail' => 'sample_app_php_payment', // Remove or replace this detail when building your own app
        ]);

        $payments_api = $square_client->getPaymentsApi();

        // To learn more about splitting payments with additional recipients,
        // see the Payments API documentation on our [developer site]
        // (https://developer.squareup.com/docs/payments-api/overview).

        $money = new Money();
        // Monetary amounts are specified in the smallest unit of the applicable currency.
        // This amount is in cents. It's also hard-coded for $1.00, which isn't very useful.
        $money->setAmount(100);
        // Set currency to the currency for the location
        $location_info = new SquareLoacationInfo();
        $money->setCurrency($location_info->getCurrency());

        try {
            // Every payment you process with the SDK must have a unique idempotency key.
            // If you're unsure whether a particular payment succeeded, you can reattempt
            // it with the same idempotency key without worrying about double charging
            // the buyer.
            $create_payment_request = new CreatePaymentRequest($token, $idempotencyKey, $money);
            $create_payment_request->setLocationId($location_info->getId());

            $response = $payments_api->createPayment($create_payment_request);

            if ($response->isSuccess()) {
                echo json_encode($response->getResult());
            } else {
                echo json_encode(array('errors' => $response->getErrors()));
            }
        } catch (ApiException $e) {
            echo json_encode(array('errors' => $e));
        }

    }
}