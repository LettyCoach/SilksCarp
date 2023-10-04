@extends('layouts.user');
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/alarm/alarm_user.css') }}">
    <div class="pagetitle">
        <h1>商品</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active"> <a href="{{ route('alarm-user.index') }}">お知らせ一覧</a> </li>
                <li class="breadcrumb-item active">お知らせ見る</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section col-lg-8 mx-auto">
        <div class="card">
            <div class="row d-flex justify-content-center">

                <div class="row d-flex justify-content-center">
                    <div class="col-10 col-lg-8 col-xl-7">
                        <div class="row mt-5">
                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-lg-3 col-form-label fw-bold">種別</label>
                                <div class="col-md-8 col-lg-9">
                                    {{ $model->getTypeName() }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-lg-3 col-form-label fw-bold">タイトル</label>
                                <div class="col-md-8 col-lg-9">
                                    {{ $model->title }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-lg-3 col-form-label fw-bold">詳細</label>
                                <div class="col-md-8 col-lg-9">
                                    {!! $model->description !!}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="end_date" class="col-md-4 col-lg-3 col-form-label fw-bold">表示期間</label>
                                <div class="col-md-8 col-lg-9">
                                    {{ $model->getEndDate() }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col d-flex justify-content-end pl-5 ml-5 py-2">
                                <button type="button" class="btn btn-secondary"
                                    onclick="location.href='{{ route('alarm-user.index') }}'">
                                    <i class="bi-list-stars"></i> 一覧を見る
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
