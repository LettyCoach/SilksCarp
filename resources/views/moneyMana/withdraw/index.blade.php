@extends('layouts.user')

@section('content')
    <div class="pagetitle">
        <h1>withdraw</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item">お金管理</li>
                <li class="breadcrumb-item">クレジット情報</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section withdraw" style="font-family: yu gothic">
        <div class="row">
            <div class="col-xl-8 mx-auto">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link {{ $page == 0 ? 'active' : '' }}" data-bs-toggle="tab"
                                    data-bs-target="#withdraw-overview">情報を見る</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link {{ $page == 1 ? 'active' : '' }}"" data-bs-toggle="tab"
                                    data-bs-target="#withdraw-setting">出金設定</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link {{ $page == 2 ? 'active' : '' }}"" data-bs-toggle="tab"
                                    data-bs-target="#withdraw-go">出金する</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade {{ $page == 0 ? 'show active' : '' }} withdraw-overview"
                                id="withdraw-overview">
                                <h5 class="card-title">Withdraw Details</h5>
                                <div class="row">
                                    <div class="col-lg-3 col-md-8 label ">銀行名</div>
                                    <div class="col-lg-9 col-md-8">{{ $money->bankName }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">口座番号</div>
                                    <div class="col-lg-9 col-md-8">{{ $money->accountNum }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">残高</div>
                                    <div class="col-lg-9 col-md-8">{{ $money->amount }}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade {{ $page == 2 ? 'show active' : '' }} withdraw-setting pt-3"
                                id="withdraw-setting">
                                <!-- Change Password Form -->
                                <form action="{{ route('withdraw.setting') }}" method="POST"
                                    enctype="multipart/form-data" onsubmit="">
                                    @csrf
                                    <input type="hidden" name="total_amount" id="total_amount" value="{{ $money->amount }}">

                                    <div class="row mb-3">
                                        <label for="withdraw_amount" class="col-md-4 col-lg-3 col-form-label">出金金額</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="withdraw_amount" type="number" class="form-control"
                                                id="withdraw_amount" >
                                            @error('withdraw_amount')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="charge" class="col-md-4 col-lg-3 col-form-label">手数料</label>
                                        <div class="col-md-8 col-lg-9" name="charge" id="charge">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="balance" class="col-md-4 col-lg-3 col-form-label">残高</label>
                                        <div class="col-md-8 col-lg-9" name="balance" id="balance">
                                        </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">出金する</button>
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

@section('js')
    <script>
       $(document).ready(function (){
            $("#withdraw_amount").keyup(function(){
                $('#charge').html(this.value * 0.1);                
                $('#balance').html($('#total_amount').val() - this.value * 1.1);                
                
            });
        });
    </script>
@endsection

