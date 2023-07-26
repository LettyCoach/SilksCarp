@extends('layouts.admin');
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/helpMana/help.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/choices.js/1.1.6/styles/css/choices.css">
    <div class="pagetitle">
        <h1>商品</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active"> <a href="{{ route('help.index') }}">ヘルプ一覧</a> </li>
                <li class="breadcrumb-item active">ヘルプ変更</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <form action="{{ route('help.update', ['help' => $model->id]) }}" method="POST" enctype="multipart/form-data"
                onsubmit="return checkData()">
                @csrf
                @method('PUT')
                <div class="row d-flex justify-content-center">
                    <div class="col-10 col-lg-8 col-xl-7">
                        <div class="row mt-5">
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-lg-3 col-form-label fw-bold">表示順番 (必須)</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="number" name="display_order" id="display_order"
                                        class="form-control rounded"
                                        value="{{ old('display_order', $model->display_order) }}" />
                                    @error('display_order')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-lg-3 col-form-label fw-bold">カテゴリ</label>
                                <div class="col-md-8 col-lg-9">
                                    <select name="categories[]" class="form-select" id="categories"
                                        placeholder="Select up to 3 tags" multiple>
                                        <option value=""></option>
                                        @foreach ($helpCategories as $item)
                                            <option value="{{ $item->id }}"
                                                {{ array_search($item->id, old('categories', $categories)) === false ? '' : 'selected' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="title" class="col-md-4 col-lg-3 col-form-label fw-bold">タイトル (必須)</label>
                                <div class="col-md-8 col-lg-9">
                                    <input type="text" name="title" id="title" class="form-control rounded"
                                        value="{{ old('title', $model->title) }}" />
                                    @error('title')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="content" class="col-md-4 col-lg-3 col-form-label fw-bold">本文 (必須)</label>
                                <div class="col-md-8 col-lg-9">
                                    <textarea name="content" id="content" class="form-control rounded" style="height: 120px">{{ old('content', $model->content) }}</textarea>
                                    @error('content')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
                                    onclick="location.href='{{ route('help.index') }}'">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/choices.js/1.1.6/choices.min.js"></script>
    <script>
        $(document).ready(function() {

            var multipleCancelButton = new Choices('#categories', {
                removeItemButton: true,
                // maxItemCount: 3,
                searchResultLimit: 5,
                renderChoiceLimit: 5
            });
        });
    </script>
@endsection
