@extends('layouts.admin');
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/productMana/product.css') }}">
    <div class="pagetitle">
        <h1>ヘルプ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active"> <a href="{{ route('help-category.index') }}">カテゴリ一覧</a> </li>
                <li class="breadcrumb-item active">カテゴリ変更</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <form action="{{ route('help-category.update', ['help_category' => $model->id]) }}" method="POST"
                enctype="multipart/form-data" onsubmit="return checkData()">
                @csrf
                @method('PUT')
                <div class="row d-flex justify-content-center">

                    <div class="col-10 col-lg-8 col-xl-6">
                        <div class="row mt-5">
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="">タイトル (必須)</label>
                                    <input type="text" name="name" id="name" class="form-control rounded"
                                        value="{{ old('name', $model->name) }}" />
                                    @error('name')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col">
                                    <label for="">説明</label>
                                    <textarea name="other" id="other" class="form-control rounded" style="height: 120px">{{ old('other', $model->other) }}</textarea>
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
                                    onclick="location.href='{{ route('help-category.index') }}'">
                                    <i class="bi-list-stars"></i> 一覧を見る
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>

    </section>
@endsection

@section('js')
@endsection
