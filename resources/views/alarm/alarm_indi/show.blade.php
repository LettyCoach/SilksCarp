@extends('layouts.user');
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/alarm/alarm_user.css') }}">
    <div class="pagetitle">
        <h1>お知らせ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active"> <a href="{{ route('alarm-indi.index') }}">お知らせ一覧</a> </li>
                <li class="breadcrumb-item active">お知らせ</li>
            </ol>
        </nav>
    </div><!-- End Page  Title -->

    <section class="section">
        <div class="card col-6 mx-auto">
            <div class="row d-flex justify-content-center">

                <div class="row d-flex justify-content-center">
                    <div class="col-10 col-lg-8 col-xl-7">
                        <h5 class="text-center mt-5 ">お知らせ</h5>
                        <hr>
                        <div class="row mt-5">
                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-lg-3 col-form-label fw-bold">種別</label>
                                <div class="col-md-8 col-lg-9">
                                    {{ $model->getTypeName() }}
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-lg-3 col-form-label fw-bold">発行日</label>
                                <div class="col-md-8 col-lg-9">
                                    {{ $model->getStartDate() }}
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col d-flex justify-content-center px-5 mx-5 py-2">
                                <button type="button" class="btn btn-secondary"
                                    onclick="location.href='{{ route('alarm-indi.index') }}'">
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
