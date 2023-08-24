@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/productMana/purchase.css') }}">
    
    <section class="section">
        <div class="" style="font-family: 'yu gothic'">
            <form action="{{ route('nogin.create') }}" method="get" enctype="multipart/form-data"
            onsubmit="return checkData()">
            @csrf
            <div class="row d-flex justify-content-center">
                
                <div class=" card d-flex justify-content-center border col-10 col-lg-8 col-xl-6 mt-5">
                        <div class="pagetitle pt-4 mt-4 ms-4" >
                            <h1 class="ms-4">錦鯉購入</h1>
                        </div><!-- End Page Title -->
                        <div class="row d-flex justify-content-center mt-5">
                            <div class="row mb-2 mt-2" style="max-width: 480px">
                                <div class="col d-flex justify-content-center">
                                    <div class="product_img_div">
                                        <img src="{{ $model->product->getImageUrl(0) }}" alt="" id="product_img_0">
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <div class="product_img_div">
                                        <img src="{{ $model->product->getImageUrl(1) }}" alt="" id="product_img_1">
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <div class="product_img_div">
                                        <img src="{{ $model->product->getImageUrl(2) }}" alt="" id="product_img_2">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap mt-4 mb-2 mx-auto" style="max-width: 80%!important;">
                                <div class="fw-bold" style="width : 160px">
                                    商品タイトル:
                                </div>
                                <div class="" style="width: calc(100% - 300px); min-width: 300px">
                                    {{ $model->product->name }}
                                </div>
                            </div>
                            <div class="d-flex flex-wrap mt-4 mb-2 mx-auto" style="max-width: 80%!important;">
                                <div class="fw-bold" style="width : 160px">
                                    価格(円):
                                </div>
                                <div class="" style="width: calc(100% - 300px); min-width: 300px">
                                    {{ number_format($model->product->price) }}
                                </div>
                            </div>
                            <div class="d-flex flex-wrap mt-4 mb-2 mx-auto" style="max-width: 80%!important;">
                                <div class="fw-bold" style="width : 160px">
                                    仕入れ値(円):
                                </div>
                                <div class="" style="width: calc(100% - 300px); min-width: 300px">
                                    {{ number_format($model->product->cost) }}
                                </div>
                            </div>
                            <div class="d-flex flex-wrap mt-4 mb-2 mx-auto" style="max-width: 80%!important;">
                                <div class="fw-bold" style="width : 160px">
                                    説明:
                                </div>
                                <div class="" style="width: calc(100% - 300px); min-width: 300px">
                                    {{ $model->product->description }}
                                </div>
                            </div>
                            <div class="d-flex flex-wrap mt-4 mb-2 mx-auto" style="max-width: 80%!important;">
                                <div class="fw-bold" style="width : 160px">
                                    処理方式:
                                </div>
                                <div class="d-flex" style="width: calc(100% - 300px); min-width: 300px">
                                    <div class="rounded-md">
                                        <select name="store_state" class="form-select" id="store_state"
                                            onchange="changeStoreState(this.value)">
                                            @foreach (Config::get('app.storeStates') as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ $key == old('store_state') ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex flex-wrap mt-4 mb-2 mx-auto  align-items-center" style="max-width: 80%!important;">
                                <div class="fw-bold" style="width : 160px">
                                    送付先住所:
                                </div>
                                <div class="" style="width: calc(100% - 300px); min-width: 300px">
                                    <input type="text" name="destination" id="destination" class="form-control rounded"
                                        disabled value="{{ old('destination') }}">
                                    @error('destination')
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row gx-4 mt-4 pb-4">
                            <div class="col d-flex justify-content-center">
                                <button name="buy" type="submit" class="btn btn-primary d-flex flex-row gx-4 mx-4 align-items-center">
                                    <i class="fa fa-check-square-o " aria-hidden="true"></i> 購入
                                </button>
                                <button name="back" type="button" class="btn btn-danger d-flex flex-row gx-4 mx-4 align-items-center" 
                                onclick="location.href='{{ route('welcome') }}'">
                                <i class="fa fa-undo" aria-hidden="true"></i> 戻る
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="id" value="{{ $model->id }}">
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('assets/js/productMana/purchase.js') }}"></script>
@endsection
