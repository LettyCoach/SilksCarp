{{-- @php
    $layout = Auth::user()->role == 'admin' ? 'admin' : 'user';
@endphp
@extends("layouts.$layout")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form action="/checkout" method="POST">
                            @csrf
                            <input type="hidden" name="amount" value="100"> <!-- Replace with your desired amount -->
                            <button type="submit">Checkout</button>
                        </form>


                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}


<!DOCTYPE html>
<html>

<head>
    <title>Payment Form</title>
    <script src="https://js.squareupsandbox.com/v2/paymentform"></script>
</head>

<body>
    <h1>Payment Form</h1>

    <form id="payment-form" action="{{ route('process.payment') }}" method="POST">
        <div id="sq-card-number"></div>
        <div id="sq-expiration-date"></div>
        <div id="sq-cvv"></div>
        <div id="sq-postal-code"></div>
        <button id="sq-creditcard" type="button">Pay Now</button>
        @csrf
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paymentForm = new SqPaymentForm({
                applicationId: '{{ config('app.square_app_id') }}',
                inputClass: 'sq-input',
                autoBuild: false,
                inputStyles: [{
                    fontSize: '16px',
                    lineHeight: '24px',
                    padding: '16px',
                    placeholderColor: '#a0a0a0',
                    backgroundColor: 'transparent',
                }, ],
                cardNumber: {
                    elementId: 'sq-card-number',
                    placeholder: 'Card Number',
                },
                cvv: {
                    elementId: 'sq-cvv',
                    placeholder: 'CVV',
                },
                expirationDate: {
                    elementId: 'sq-expiration-date',
                    placeholder: 'MM/YY',
                },
                postalCode: {
                    elementId: 'sq-postal-code',
                    placeholder: 'Postal Code',
                },
                callbacks: {
                    cardNonceResponseReceived: function(errors, nonce, cardData) {
                        if (errors) {
                            // Log any errors
                            console.error(errors);
                        } else {
                            // Assign the nonce value to the hidden form input
                            document.getElementById('card-nonce').value = nonce;
                            // Submit the form
                            document.getElementById('payment-form').submit();
                        }
                    },
                },
            });

            paymentForm.build();
            document.getElementById('sq-creditcard').addEventListener('click', function() {
                paymentForm.requestCardNonce();
            });
        });
    </script>
</body>

</html>
