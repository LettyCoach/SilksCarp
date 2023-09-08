@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/productMana/purchase.css') }}">

    <div class="pagetitle">
        <h1>ユーザー登録と購入</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item">ユーザー情報</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section profile" style="font-family: yu gothic">
        <div class="row d-flezx justify-content-center">
            <div class="col-xl-4">

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <div class="tab-content pt-2">

                            <form action="{{ route('nogin.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="destination_address"
                                        class="col-md-4 col-lg-3 col-form-label">送付先住所</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="destination_address" type="text" class="form-control"
                                            id="destination_address" value="">
                                        @error('destination_address')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="post_code"
                                        class="col-md-4 col-lg-3 col-form-label">郵便番号</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="post_code" type="text" class="form-control"
                                            id="post_code" value="">
                                        @error('post_code')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="prefecture"
                                        class="col-md-4 col-lg-3 col-form-label">都道府県</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="prefecture" type="text" class="form-control"
                                            id="prefecture" value="">
                                        @error('prefecture')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="city"
                                        class="col-md-4 col-lg-3 col-form-label">市区町村</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="city" type="text" class="form-control"
                                            id="city" value="">
                                        @error('city')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                                                    
                                <div class="row mb-3">
                                    <label for="street"
                                        class="col-md-4 col-lg-3 col-form-label">番地</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="street" type="text" class="form-control"
                                            id="street" value="">
                                        @error('street')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                    
                                <div class="row mb-3">
                                    <label for="building"
                                        class="col-md-4 col-lg-3 col-form-label">建物名・部屋番号</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="building" type="text" class="form-control"
                                            id="building" value="">
                                    </div>
                                </div>
                                                                                                                                                
                                                                                                                                            
                                <div class="row mb-3">
                                    <label for="phone"
                                        class="col-md-4 col-lg-3 col-form-label">ご連絡先電話番号</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="phone" type="tel" class="form-control"
                                            id="phone" value="">
                                        @error('phone')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                
                                
                                <div class="row mb-3">
                                    <label for="gender"
                                        class="col-md-4 col-lg-3 col-form-label">性別</label>
                                    <div class="col-md-4 col-lg-3">
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="male" selected>男性</option>
                                            <option value="female">女性</option>
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <div class="row mb-3">
                                    <label for="birth"
                                        class="col-md-4 col-lg-3 col-form-label">誕生年月</label>
                                    <div class="col-md-6 col-lg-6">
                                        <input name="birth" type="date" class="form-control"
                                            id="birth" value="">
                                        @error('birth')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <input type="hidden" name="trade_id" value='{{ $trade_id }}'>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">登録と購入</button>
                                </div>
                                <input type="hidden" name="hostUrl" id="hostUrl" value="{{ url('/') }}">
        <input type="hidden" name="assetUrl" id="assetUrl" value="{{ asset('/') }}">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                            </form><!-- End Profile Edit Form -->

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{ asset('assets/js/productMana/product.js') }}"></script>
@endsection