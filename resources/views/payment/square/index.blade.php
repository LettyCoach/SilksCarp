@extends('layouts.user')
@section('css&js')
    <script type="text/javascript" src="{{ $web_payment_sdk_url }}"></script>
    <script type="text/javascript">
        window.applicationId = "{{ Config::get('square.application_id') }}";
        window.locationId = "{{ Config::get('square.location_id') }}";
        window.currency = "{{ $location_info->getCurrency() }}";
        window.country = "{{ $location_info->getCountry() }}";
        window.idempotencyKey = "{{ $idempotencyKey }}";
    </script>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/square/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/square/css/sq-payment.css') }}">
@endsection

@section('content')
    <div class="pagetitle">
        <h1>商品</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active">錦鯉閲覧</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="card">
                <form class="payment-form" id="fast-checkout">
                    @csrf
                    <div class="wrapper">
                        <div id="apple-pay-button" alt="apple-pay" type="button"></div>
                        <div id="google-pay-button" alt="google-pay" type="button"></div>
                        <div class="border">
                            <span>SQ</span>
                        </div>
                        <div class="d-flex content-justify-center p-3">
                            <img src="{{ asset('assets/images/topPage/payment.webp') }}" alt="">
                        </div>
                        <div id="card-container"></div><button id="card-button" type="button">Pay with Card</button>
                        <span id="payment-flow-message"></span>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
@endsection

@section('js')
    <script type="text/javascript" src="{{ asset('assets/square/js/sq-ach.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/square/js/sq-apple-pay.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/square/js/sq-card-pay.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/square/js/sq-google-pay.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/square/js/sq-payment-flow.js') }}"></script>
@endsection
