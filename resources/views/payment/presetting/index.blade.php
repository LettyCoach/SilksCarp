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
                <div class="presetting_user d-flex w-75 p-1 mt-1 mx-auto ">
                    <div class="col-4 bg-secondary text-white p-2 fs-5 border border-end-0">
                        <p class="badge bg-danger fs-6">必須</p><br>
                        オンラインショップの<br>ご利用について
                    </div>
                    <div class="col-8 p-3 fs-5 border border-start-0">
                        <div id="choice_first" class="d-block border rounded w-100 p-3 ps-5 bg-light bg-gradient cursor-point">
                            <input type="radio" name="choice" id="choice_first-rdo" value="new"  checked>
                            <label for="choice_first">初めての方</label>
                        </div>
                        <div id="choice_last" class="d-block border rounded w-100 p-3 ps-5 mt-3 bg-light bg-gradient cursor-point">
                            <input type="radio" name="choice" id="choice_last-rdo" value="last">
                            <label for="choice_first">既にID・パスワードを<br class="sp_mode">お持ちの方</label>
                        </div>
                    </div>
                </div>
                <form action="{{ route('presetting.index') }}" method="get">
                @csrf
                    <input type="hidden" name="trade_id" id="trade_id" value="{{ $trade_id }}">
                    <div class="presetting_register">
                        <div class="register-id d-flex w-75 p-1 py-0 mt-1 mx-auto">
                            <div class="col-4 bg-secondary text-white p-2 fs-5 border border-end-0 register-id">
                                <p class="badge bg-danger fs-6">必須</p><br>
                                ID（メールアドレス）
                            </div>
                            <div class="col-8 p-3 fs-5 border border-start-0 regitster-id">
                                <input class="w-100" type="email" name="register-id" id="register-id" placeholder="例：name@oooo.co.jp" required>
                                <p class="fs-6">※ IDはメールアドレスをご入力ください。 <br>
                                ※ 既に登録されたことのあるメールアドレスは登録できません。</p>
                            </div>
                        </div>
                        <div class="register-id-confirm d-flex w-75 p-1 py-0 mx-auto">
                            <div class="col-4 bg-secondary text-white p-2 fs-5 border border-end-0 register-id-confirm">
                                <p class="badge bg-danger fs-6">必須</p><br>
                                ID（メールアドレス）<br>（再入力）
                            </div>
                            <div class="col-8 p-3 fs-5 border border-start-0 regitster-id">
                                <input class="w-100" type="email" name="register-id-confirm" id="register-id-confirm" placeholder="例：name@oooo.co.jp" required>
                            </div>
                        </div>
                        <div class="register-pwd d-flex w-75 p-1 py-0 mx-auto">
                            <div class="col-4 bg-secondary text-white p-2 fs-5 border border-end-0 register-pwd">
                                <p class="badge bg-danger fs-6">必須</p><br>
                                パスワード
                            </div>
                            <div class="col-8 p-3 fs-5 border border-start-0 regitster-pwd">
                                <input class="w-100" type="password" name="register-pwd" id="register-pwd" placeholder="" required><br>
                                <p class="fs-6">※ 半角英数字を混ぜてご入力ください。（6文字以上20文字以内）<br>
                                ※ 類推されやすいものはお避けください。</p>
                            </div>
                        </div>
                        <div class="register-pwd-confirm d-flex w-75 p-1 py-0 mx-auto">
                            <div class="col-4 bg-secondary text-white p-2 fs-5 border border-end-0 register-pwd-confirm">
                                <p class="badge bg-danger fs-6">必須</p><br>
                                パスワード<br>（再入力）
                            </div>
                            <div class="col-8 p-3 fs-5 border border-start-0 regitster-pwd">
                                <input class="w-100" type="password" name="register-pwd-confirm" id="register-pwd-confirm" placeholder="" required>
                            </div>
                        </div>
                        <div class="presetting_submit">
                            <input type="submit" value="登録とログイン">
                        </div>
                    </div>
                </form>
                <form action="{{ route('presetting.index') }}" method="get">
                    @csrf
                    <div class="presetting_login" style="display:none">
                        <div class="login-id d-flex w-75 p-1 py-0 mt-1 mx-auto">
                            <div class="col-4 bg-secondary text-white p-2 fs-5 border border-end-0 login-id">
                                <p class="badge bg-danger fs-6">必須</p><br>
                                ID（メールアドレス）
                            </div>
                            <div class="col-8 p-3 fs-5 border border-start-0 login-id">
                                <input class="w-100" type="email" name="register-pwd-confirm" id="register-pwd-confirm" placeholder="" required>
                            </div>
                        </div>
                        <div class="login-pwd d-flex w-75 p-1 py-0 mx-auto">
                            <div class="col-4 bg-secondary text-white p-2 fs-5 border border-end-0 login-pwd">
                                <p class="badge bg-danger fs-6">必須</p><br>
                                パスワード
                            </div>
                            <div class="col-8 p-3 fs-5 border border-start-0 login-pwd">
                                <input class="w-100" type="password" name="register-pwd-confirm" id="register-pwd-confirm" placeholder="" required>
                            </div>
                        </div>
                        <div class="presetting_submit">
                            <input type="submit" value="ログイン">
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
            $("#choice_last").click(function(){
                $(".presetting_register").css("display", "none");
                $(".presetting_login").css("display", "block");
                $("#choice_last-rdo").prop('checked', true); 
                
                
            });
            $("#choice_first").click(function(){
                $(".presetting_register").css("display", "block");
                $(".presetting_login").css("display", "none");
                $("#choice_first-rdo").prop('checked', true); 
            });
        });
    </script>
@endsection
