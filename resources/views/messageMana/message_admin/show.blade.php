@extends('layouts.admin');
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/messageMana/message_admin.css') }}">
    <div class="pagetitle">
        <h1>メッセージ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active"> <a href="{{ route('message-admin.index') }}">メッセージ一覧</a> </li>
                <li class="breadcrumb-item active">メッセージ見る</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="row d-flex justify-content-center">

                <div class="col-10 col-lg-8 col-xl-6">
                    <div class="row mt-5">
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-lg-3 col-form-label fw-bold">タイトル (必須)</label>
                            <div class="col-md-8 col-lg-9">
                                <input type="text" name="title" id="title" class="form-control rounded"
                                    value="{{ $model->title }}" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="content" class="col-md-4 col-lg-3 col-form-label fw-bold">詳細 (必須)</label>
                            <div class="col-md-8 col-lg-9">
                                <textarea name="content" id="content" class="form-control rounded" style="height: 120px">{{ $model->content }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <button type="button" class="btn btn-secondary"
                                onclick="location.href='{{ route('message-admin.index') }}'">
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
