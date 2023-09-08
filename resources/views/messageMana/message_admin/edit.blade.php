@extends('layouts.admin');
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/messageMana/message_admin.css') }}">
    <div class="pagetitle">
        <h1>メッセージ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active"> <a href="{{ route('message-admin.index') }}">メッセージ一覧</a> </li>
                <li class="breadcrumb-item active">メッセージ変更</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row d-flex justify-content-center">
            <div class="col col-md-10 col-xl-9">
                <div class="card p-4">
                    <div class="message_list row p-4">
                        <div class="message">
                            <div class="message-user">
                                <div class="_header">
                                    <img src="{{ $model->user->getAvatar() }}" alt="">
                                    <div>
                                        <h5>{{ $model->title }}</h5>
                                        <p>{{ $model->user->name }}</p>
                                    </div>
                                </div>
                                <div class="_body">
                                    <div>{!! $model->content !!}</div>
                                    <div>{{ $model->created_at }}</div>
                                </div>
                            </div>
                            @foreach ($subModels as $sm)
                                <div class="{{ $sm->type === 0 ? 'message-user' : 'message-admin' }}">
                                    <div class="_header">
                                        <img src="{{ $sm->type === 0 ? $model->user->getAvatar() : Auth::user()->getAvatar() }}"
                                            alt="">
                                        <div>
                                            <h5>{{ $sm->title }}</h5>
                                            <p>{{ $sm->type === 0 ? $model->user->name : Auth::user()->name }}</p>
                                        </div>
                                    </div>
                                    <div class="_body">
                                        <div>{!! $sm->content !!}</div>
                                        <div>{{ $sm->created_at }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="message_pan ">
                        <form action="{{ route('message-admin.update', ['message_admin' => $model->id]) }}" method="POST"
                            enctype="multipart/form-data" onsubmit="return checkData()">
                            @csrf
                            @method('PUT')
                            <div class="message_pan_body">
                                <div class="message_pan_txt gap-2">
                                    <div class="">
                                        <input type="text" name="title" id="title" class="form-control rounded"
                                            value="{{ old('title') }}" placeholder="タイトル(必須)" />
                                        @error('title')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="">
                                        <textarea name="content" id="content" class="form-control rounded" placeholder="詳細(必須)" style="height: 60px">{{ old('content') }}</textarea>
                                    </div>
                                </div>

                                <div class="message_pan_btn gap-2">
                                    <div class="">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                            送信
                                        </button>
                                    </div>
                                    <div class="">
                                        <button type="button" class="btn btn-danger p-2"
                                            onclick="location.href='{{ route('message-admin.index') }}'">
                                            <i class="bi-list-stars"></i>
                                        </button>
                                        @if ($model->response_state === 0)
                                            <button type="button" class="btn btn-success p-2"
                                                onclick="location.href='{{ route('message-admin.response-state', ['id' => $model->id]) }}'">
                                                <i class="fa fa-check-square-o" aria-hidden="true"></i>
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('js')
    <script>
        // function functionTobeLoaded() {
        //     $('.message_pan').scrollTop($('.message_pan')[0].scrollHeight);
        //     var d = $('.message_pan');
        //     d.scrollTop(d.prop("scrollHeight"));
        //     $(".message_pan").animate({
        //         scrollTop: $('.message_pan').prop("scrollHeight")
        //     }, 1000);
        // }
        // $(window).on('load', functionTobeLoaded());
        // $(document).ready(function() {
        //     // $('.message_pan').scrollTop(1000);
        //     // $('.message_pan').scrollTop($('.message_pan')[0].scrollHeight);
        //     // console.log($('.message_pan')[0].scrollHeight);
        //     var d = $('.message_pan');
        //     d.scrollTop(d.prop("scrollHeight"));
        //     $(".message_pan").animate({
        //         scrollTop: $('.message_pan').prop("scrollHeight")
        //     }, 1000);
        // });
        // $('.message_pan').scrollTop(1000);
    </script>
@endsection
