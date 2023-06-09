@extends('layouts.admin');
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/alarm/a2a.css') }}">
    <div class="pagetitle">
        <h1>お知らせ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active"> <a href="{{ route('a2a.index') }}">お知らせ一覧</a> </li>
                <li class="breadcrumb-item active">お知らせ追加</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section" style="font-family: yu gothic">
        <div class="card">
            <form action="{{ route('a2a.store') }}" method="post" enctype="multipart/form-data"
                onsubmit="return checkData()">
                @csrf
                <div class="row d-flex justify-content-center">

                    <div class="col-10 col-lg-8 col-xl-7">
                        <div class="row mt-5">
                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-lg-3 col-form-label fw-bold">種別</label>
                                <div class="col-md-8 col-lg-9">
                                    <select name="type" class="form-select" id="type" onchange="viewIndex()">
                                        @foreach (Config::get('app.alarmTypes') as $k => $v)
                                            <option value="{{ $k }}">{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
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
                                <label for="description" class="col-md-4 col-lg-3 col-form-label fw-bold">詳細 (必須)</label>
                                <div class="col-md-8 col-lg-9">
                                    <textarea name="description" id="description" class="form-control rounded" style="height: 120px">{{ old('description') }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="end_date" class="col-md-4 col-lg-3 col-form-label fw-bold">表示期間 (必須)</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="date" name="end_date" id="end_date" class="form-control rounded"
                                        value="{{ old('end_date', $today) }}" placeholder="" />
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
                                    onclick="location.href='{{ route('a2a.index') }}'">
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
