@extends('layouts.admin');
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/productMana/product.css') }}">
    <div class="pagetitle">
        <h1>商品</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active"> <a href="{{ route('help-category.index') }}">カテゴリ一覧</a> </li>
                <li class="breadcrumb-item active">カテゴリ見る</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="row d-flex justify-content-center">

                <div class="col-10 col-lg-8 col-xl-6">
                    <div class="row mt-5">
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">タイトル </label>
                                <input type="text" name="name" id="name" class="form-control rounded"
                                    value="{{ $model->name }}" />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">説明</label>
                                <textarea name="other" id="other" class="form-control rounded" style="height: 120px">{{ $model->other }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary"
                                onclick="location.href='{{ route('help-category.index') }}'">
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
