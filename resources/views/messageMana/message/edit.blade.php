@extends('layouts.admin');
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/messageMana/message.css') }}">
    <div class="pagetitle">
        <h1>商品</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active"> <a href="{{ route('message.index') }}">商品一覧</a> </li>
                <li class="breadcrumb-item active">商品変更</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <form action="{{ route('message.update', ['message' => $model->id]) }}" method="POST"
                enctype="multipart/form-data" onsubmit="return checkData()">
                @csrf
                @method('PUT')
                <div class="row d-flex justify-content-center">

                    <div class="col-10 col-lg-8 col-xl-6">
                        <div class="row mt-5">
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="">商品 (必須)</label>
                                    <input type="text" name="name" id="name" class="form-control rounded"
                                        value="{{ old('name', $model->name) }}" />
                                    @error('name')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <label for="">写真</label>
                            <div class="row mb-2 mt-2">
                                <div class="col d-flex justify-content-center">
                                    <div class="product_img_div">
                                        <img src="{{ asset('assets/images/common/transparent.png') }}" alt=""
                                            id="product_img_0">
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <div class="product_img_div">
                                        <img src="{{ asset('assets/images/common/transparent.png') }}" alt=""
                                            id="product_img_1">
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <div class="product_img_div">
                                        <img src="{{ asset('assets/images/common/transparent.png') }}" alt=""
                                            id="product_img_2">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="">価格 (必須)</label>
                                    <input type="text" name="price" id="price" class="form-control rounded"
                                        value="{{ old('price', $model->price) }}" />
                                    @error('price')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="">説明</label>
                                    <textarea name="description" id="description" class="form-control rounded" style="height: 120px">{{ old('description', $model->description) }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="">仕入れ値 (必須)</label>
                                    <input type="text" name="cost" id="cost" class="form-control rounded"
                                        value="{{ old('cost', $model->cost) }}" />
                                    @error('cost')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="">仕入先URL</label>
                                    <input type="text" name="supplier_url" id="supplier_url" class="form-control rounded"
                                        value="{{ old('supplier_url', $model->supplier_url) }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col d-flex justify-content-end">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-check"></i> セーブ
                                </button>
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-secondary"
                                    onclick="location.href='{{ route('message.index') }}'">
                                    <i class="bi-list-stars"></i> 一覧を見る
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
                <input type="hidden" name="images" id="images" value="{{ old('images', $model->images) }}">
            </form>
        </div>

        <input type="hidden" name="plusImgUrl" id="plusImgUrl" value="{{ $model->getPlusImgUrl() }}">
        <input type="hidden" name="hostUrl" id="hostUrl" value="{{ url('/') }}">
        <input type="hidden" name="assetUrl" id="assetUrl" value="{{ asset('/') }}">
        <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
    </section>
@endsection

@section('js')
    <script src="{{ asset('assets/js/messageMana/message.js') }}"></script>
@endsection
