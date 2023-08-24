@extends('layouts.user')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/payment/presetting.css') }}">
    <div class="pagetitle">
        <h1>商品</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active">錦鯉閲覧</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="card p-5 pb-6" >
                <form action="{{ route('presetting.store') }}" method="post">
                    @csrf
                    <div class="custom_info">
                        <div class="custom-name d-flex w-75 p-1 py-0 mt-1 mx-auto">
                            <div class="col-4 bg-secondary text-white p-2 fs-5 border border-end-0 register-id">
                                <p class="badge bg-danger fs-6">必須</p><br>
                                氏名
                            </div>
                            <div class="d-flex d-flex-center  justify-content-around col-8 p-3 fs-5 border py-3 border-start-0">
                                <input class="w-100 h-75" type="text" name="custom_first_name" id="custom_first_name" style="max-width: 215px" placeholder="例：朝日" required>
                                <input class="w-100 h-75" type="text" name="custom_last_name" id="custom_last_name" style="max-width: 215px" placeholder="例：太郎" required>
                            </div>
                        </div>
                        <div class="custom_kana d-flex w-75 p-1 py-0 mx-auto">
                            <div class="col-4 bg-secondary text-white p-2 fs-5 border border-end-0 register-id">
                                <p class="badge bg-danger fs-6">必須</p><br>
                                氏名（カナ）
                            </div>
                            <div class="d-flex d-flex-center  justify-content-around col-8 p-3 fs-5 border py-3 border-start-0">
                                <input class="w-100 h-75" type="text" name="custom_first_kana" id="custom_first_kana" style="max-width: 215px" placeholder="例：アサヒ" required>
                                <input class="w-100 h-75" type="text" name="custom_last_kana" id="custom_last_kana" style="max-width: 215px" placeholder="例：タロウ" required>
                            </div>
                        </div>
                        <div class="custom-kana d-flex w-75 p-1 py-0 mx-auto">
                            <div class="col-4 bg-secondary text-white p-2 fs-5 border border-end-0 register-id">
                                <p class="badge bg-danger fs-6">必須</p><br>
                                都道府県
                            </div>
                            <div class="d-flex d-flex-center  justify-content-around col-8 p-3 fs-5 border py-3 border-start-0">
                                <input class="w-100 h-75" type="text" name="custom_prefecture" id="custom_prefecture" style="max-width: 215px" placeholder="" required>
                            </div>
                        </div>
                        <div class="custom-kana d-flex w-75 p-1 py-0 mx-auto">
                            <div class="col-4 bg-secondary text-white p-2 fs-5 border border-end-0 register-id">
                                <p class="badge bg-danger fs-6">必須</p><br>
                                市区町村
                            </div>
                            <div class="d-flex d-flex-center  justify-content-around col-8 p-3 fs-5 border py-3 border-start-0">
                                <input class="w-100 h-75" type="text" name="custom_city" id="custom_city" style="max-width: 215px" placeholder="" required>
                            </div>
                        </div>
                        <div class="register-id-confirm d-flex w-75 p-1 py-0 mx-auto">
                            <div class="col-4 bg-secondary text-white p-2 fs-5 border border-end-0 register-id-confirm">
                                <p class="badge bg-danger fs-6">必須</p><br>
                                番地
                            </div>
                            <div class="col-8 p-3 fs-5 border py-3 border-start-0 regitster-id">
                                <input class="w-100" type="text" name="custom_address" id="custom_address" placeholder="" required>
                            </div>
                        </div>
                        <div class="register-id-confirm d-flex w-75 p-1 py-0 mx-auto">
                            <div class="col-4 bg-secondary text-white p-2 fs-5 border border-end-0 register-id-confirm">
                                建物名・部屋番号	
                            </div>
                            <div class="col-8 p-3 fs-5 border py-2 border-start-0 regitster-id">
                                <input class="w-100" type="text" name="custom_building" id="custom_building" placeholder="" required>
                            </div>
                        </div>
                        <div class="register-id-confirm d-flex w-75 p-1 py-0 mx-auto">
                            <div class="col-4 bg-secondary text-white p-2 fs-5 border border-end-0 register-id-confirm">
                                <p class="badge bg-danger fs-6">必須</p><br>
                                ご連絡先電話番号
                            </div>
                            <div class="col-8 p-3 fs-5 border py-3 border-start-0 regitster-id">
                                <input class="w-100" type="text" name="custom_phone" id="custom_phone" placeholder="" required>
                                <p class="fs-6">※ ハイフン（－）は入力しないでください。</p>
                            </div>
                        </div>
                        <div class="custom-name d-flex w-75 p-1 py-0 mx-auto">
                            <div class="col-4 bg-secondary text-white p-2 fs-5 border border-end-0 register-id">
                                <p class="badge bg-danger fs-6">必須</p><br>
                                性別	
                            </div>
                            <div class="d-flex d-flex-center  justify-content-around col-8 p-3 fs-5 border py-3 border-start-0">
                                <div class="d-block border rounded w-100 p-3 ps-4  bg-light bg-gradient cursor-point" id="gendar-female_choice" style="max-width: 215px">
                                    <input type="radio" name="gendar" id="gendar-female" value="female"  checked>
                                    <label for="choice_first">女性</label>
                                </div>
                                <div class="d-block border rounded w-100 p-3 ps-4 bg-light bg-gradient cursor-point" id="gendar-male_choice" style="max-width: 215px">
                                    <input type="radio" name="gendar" id="gendar-male" value="male">
                                    <label for="choice_first">男性</label>
                                </div>
                            </div>
                        </div>
                        <div class="custom-name d-flex w-75 p-1 py-0 mx-auto">
                            <div class="col-4 bg-secondary text-white p-2 fs-5 border border-end-0 register-id">
                                <p class="badge bg-danger fs-6">必須</p><br>
                                誕生年月	
                            </div>
                            <div class="d-flex d-flex-center  justify-content-around col-8 p-3 fs-5 border py-3 border-start-0">
                                <input class="w-100 h-75" type="year" name="birth_year" id="birth_year" style="max-width: 215px">
                                <input class="w-100 h-75" type="month" name="birth_month" id="birth_month" style="max-width: 215px">
                            </div>
                        </div>
                        
                        <div class="presetting_submit">
                            <input type="submit" value="お届">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
       $(document).ready(function (){
            $("#gendar-male_choice").click(function(){
                $("#gendar-male").prop('checked', true); 
                
                
            });
            $("#gendar-female_choice").click(function(){
                $("#gendar-female").prop('checked', true); 
            });
        });
    </script>
@endsection
