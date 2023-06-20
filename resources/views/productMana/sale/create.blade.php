@extends('layouts.user');
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/productMana/sale.css') }}">
    <div class="pagetitle">
        <h1>売却　</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item"><a href="{{ route('sale.index') }}">所有一覧</a></li>
                <li class="breadcrumb-item active">詳細</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card border" style="font-family: 'yu gothic'">
            <form action="{{ route('sale.store') }}" method="post" enctype="multipart/form-data"
                onsubmit="return checkData()">
                @csrf
                <div class="row d-flex justify-content-center">
                    <div class="col-10 col-lg-8 col-xl-6">
                        <div class="row mt-5 justify-content-center">
                            <div class="row mb-2 mt-2" style="max-width: 480px">
                                <div class="col d-flex justify-content-center">
                                    <div class="product_img_div">
                                        <img src="{{ $model->product->getImageUrl(0) }}" alt="" id="product_img_0">
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <div class="product_img_div">
                                        <img src="{{ $model->product->getImageUrl(1) }}" alt="" id="product_img_1">
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <div class="product_img_div">
                                        <img src="{{ $model->product->getImageUrl(2) }}" alt="" id="product_img_2">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap mt-4 mb-2">
                                <div class="fw-bold" style="width : 160px">
                                    商品タイトル:
                                </div>
                                <div class="" style="width: calc(100% - 180px); min-width: 360px">
                                    {{ $model->product->name }}
                                </div>
                            </div>
                            <div class="d-flex flex-wrap mt-4 mb-2">
                                <div class="fw-bold" style="width : 160px">
                                    価格(円):
                                </div>
                                <div class="" style="width: calc(100% - 180px); min-width: 360px">
                                    {{ number_format($model->product->price) }}
                                </div>
                            </div>
                            <div class="d-flex flex-wrap mt-4 mb-2">
                                <div class="fw-bold" style="width : 160px">
                                    説明:
                                </div>
                                <div class="" style="width: calc(100% - 180px); min-width: 360px">
                                    {{ $model->product->description }}
                                </div>
                            </div>
                        </div>
                        <div class="row gx-4 mt-4">
                            <div class="col d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary d-flex flex-row gx-4 align-items-center">
                                    <i class="fa fa-check-square-o " aria-hidden="true"></i> 売却
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-secondary d-flex align-items-center"
                                    onclick="location.href='{{ route('sale.index') }}'">
                                    <i class="bi-list-stars "></i> 一覧を見る
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="id" value="{{ $model->id }}">
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('assets/js/productMana/sale.js') }}"></script>
@endsection
