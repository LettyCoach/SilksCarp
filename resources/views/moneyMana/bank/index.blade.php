@extends('layouts.user')

@section('content')
    <div class="pagetitle">
        <h1>銀行</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item">お金管理</li>
                <li class="breadcrumb-item">銀行情報</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section bank" style="font-family: yu gothic">
        <div class="row">
            <div class="col-xl-8 mx-auto">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link {{ $page == 0 ? 'active' : '' }}" data-bs-toggle="tab"
                                    data-bs-target="#bank-overview">情報を見る</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link {{ $page == 1 ? 'active' : '' }}"" data-bs-toggle="tab"
                                    data-bs-target="#bank-update">銀行情報変更</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade {{ $page == 0 ? 'show active' : '' }} bank-overview"
                                id="bank-overview">
                                <h5 class="card-title">Bank Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-8 label ">銀行名</div>
                                    <div class="col-lg-9 col-md-8">{{ $money->bankName }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">口座番号</div>
                                    <div class="col-lg-9 col-md-8">{{ $money->accountNum }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">支店番号</div>
                                    <div class="col-lg-9 col-md-8">{{ $money->pointNum }}</div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">支店名</div>
                                    <div class="col-lg-9 col-md-8">{{ $money->pointName }}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade {{ $page == 1 ? 'show active' : '' }} bank-update pt-3"
                                id="bank-update">
                                <!-- Change Password Form -->
                                <form action="{{ route('bank.update') }}" method="POST"
                                    enctype="multipart/form-data" onsubmit="">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="bankName" class="col-md-4 col-lg-3 col-form-label">銀行名</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="bankName" type="text" class="form-control"
                                                id="bankName" >
                                            @error('bankName')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="accountNum" class="col-md-4 col-lg-3 col-form-label">口座番号</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="accountNum" type="text" class="form-control"
                                                id="accountNum" >
                                            @error('accountNum')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="pointNum" class="col-md-4 col-lg-3 col-form-label">支店番号</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="pointNum" type="number" class="form-control"
                                                id="pointNum" >
                                            @error('pointNum')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="row mb-3">
                                        <label for="pointName" class="col-md-4 col-lg-3 col-form-label">口座名義</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="pointName" type="text" class="form-control"
                                                id="pointName" >
                                            @error('pointName')
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
