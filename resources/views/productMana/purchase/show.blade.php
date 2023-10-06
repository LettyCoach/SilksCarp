@extends('layouts.user');
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/productMana/purchase.css') }}">
    <div class="pagetitle">
        <h1>商品</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active"> <a href="{{ route('purchase.index') }}">商品一覧</a> </li>
                <li class="breadcrumb-item active">商品見る</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section col-lg-10 mx-auto">
        <div class="card">
            <div class="row d-flex justify-content-center">

                <div class="col-10 col-lg-10 col-xl-6">
                    <div class="row mt-5">
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">商品</label>
                                <div class="form-control rounded">
                                    {{ $model->name }}
                                </div>
                    
                            </div>
                        </div>
                        <label for="">写真</label>
                        <div class="row mb-2 mt-2">
                            <div class="col d-flex justify-content-center">
                                <div class="product_img_div">
                                    <img src="{{ $model->getImageUrl(0) }}" alt="" id="product_img_0">
                                </div>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <div class="product_img_div">
                                    <img src="{{ $model->getImageUrl(1) }}" alt="" id="product_img_1">
                                </div>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <div class="product_img_div">
                                    <img src="{{ $model->getImageUrl(2) }}" alt="" id="product_img_2">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">価格(円)</label>
                                <div class="form-control rounded" style="min-height: 38px;">
                                    {{ number_format($model->price) }}
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">説明</label>
                                <div name="description" id="description" class="form-control rounded" style="height: 120px" disabled>{{ $model->description }}</div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">仕入れ値(円)</label>
                                <div class="form-control rounded" style="min-height: 38px;">
                                    {{ number_format($model->cost) }}
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">仕入先URL</label>
                                <div class="form-control rounded" style="min-height: 38px;">
                                    {{ $model->supplier_url }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row py-3">
                        <div class="col d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary"
                                onclick="location.href='{{ route('purchase.index') }}'">
                                <i class="bi-list-stars"></i> 一覧を見る
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
