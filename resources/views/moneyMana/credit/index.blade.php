@extends('layouts.user')

@section('content')
    <div class="pagetitle">
        <h1>credit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item">お金管理</li>
                <li class="breadcrumb-item">クレジット情報</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section credit" style="font-family: yu gothic">
        <div class="row">
            <div class="col-xl-8 mx-auto">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link {{ $page == 0 ? 'active' : '' }}" data-bs-toggle="tab"
                                    data-bs-target="#credit-overview">情報を見る</button>
                            </li>

                            @if ( $money->cardNum == "" )
                                <li class="nav-item">
                                    <button class="nav-link {{ $page == 1 ? 'active' : '' }}"" data-bs-toggle="tab"
                                        data-bs-target="#credit-update">クレジット情報登録</button>
                                </li>
                            @else
                                <li class="nav-item">
                                    <button class="nav-link {{ $page == 1 ? 'active' : '' }}"" data-bs-toggle="tab"
                                        data-bs-target="#credit-update">クレジット情報変更</button>
                                </li>
                            @endif


                        </ul>
                        <div class="tab-content pt-2">

                            <?php  
                                if( $money->cardNum == "" ){
                                    $cardNum = "未登録";
                                    $secord = "";
                                }else {
                                    $cardNum = substr($money->cardNum, 0, 4 ). ' ＊＊＊＊ ＊＊＊＊ ＊＊＊＊';
                                    $secord = '＊＊ ' .substr($money->secord, 2, 3);
                                }
                            ?>

                            <div class="tab-pane fade {{ $page == 0 ? 'show active' : '' }} credit-overview"
                                id="credit-overview">
                                <h5 class="card-title">credit Details</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">カード番号</div>
                                    <div class="col-lg-9 col-md-8">{{ $cardNum }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">有効期間</div>
                                    <div class="col-lg-9 col-md-8">{{ $money->period }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">カード名</div>
                                    <div class="col-lg-9 col-md-8">{{ $money->cardType }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">セキュリティコード</div>
                                    <div class="col-lg-9 col-md-8">{{ $secord }}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade {{ $page == 1 ? 'show active' : '' }} credit-update pt-3"
                                id="credit-update">
                                <!-- Change Password Form -->
                                <form action="{{ route('credit.update') }}" method="POST"
                                    enctype="multipart/form-data" onsubmit="">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="cardNum" class="col-md-4 col-lg-3 col-form-label">カード番号</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="cardNum" type="tel" class="form-control"
                                                id="cardNum" value="{{ $money->cardNum }}">
                                            @error('cardNum')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="expiration" class="col-md-4 col-lg-3 col-form-label">有効期間</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="expiration" type="date" class="form-control"
                                                id="expiration" value="{{ $money->period }}">
                                            @error('expiration')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="cardType" class="col-md-4 col-lg-3 col-form-label">カード名</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="cardType" type="tel" class="form-control"
                                                id="cardType" value="{{ $money->cardType }}">
                                            @error('cardType')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="cardSecret" class="col-md-4 col-lg-3 col-form-label">セキュリティコード</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="cardSecret" type="text" class="form-control"
                                                id="cardSecret" value="{{ $secord }}">
                                            @error('cardSecret')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">変更</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
