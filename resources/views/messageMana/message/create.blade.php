@extends('layouts.user');
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/messageMana/message.css') }}">
    <div class="pagetitle">
        <h1>メッセージ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active"> <a href="{{ route('message.index') }}">メッセージ一覧</a> </li>
                <li class="breadcrumb-item active">メッセージ追加</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section" style="font-family: yu gothic">
        <div class="card">
            <form action="{{ route('message.store') }}" method="post" enctype="multipart/form-data"
                onsubmit="return checkData()">
                @csrf
                <div class="row d-flex justify-content-center">

                    <div class="col-10 col-lg-8 col-xl-7">
                        <div class="row mt-5">
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-lg-3 col-form-label fw-bold">タイトル (必須)</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="text" name="title" id="title" class="form-control rounded"
                                        value="{{ old('title') }}" />
                                    @error('title')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="content" class="col-md-4 col-lg-3 col-form-label fw-bold">詳細 (必須)</label>
                                <div class="col-md-8 col-lg-9">
                                    <textarea name="content" id="content" class="form-control rounded" style="height: 120px">{{ old('content') }}</textarea>
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
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#datepicker').datepicker();
        });
    </script>
@endsection
