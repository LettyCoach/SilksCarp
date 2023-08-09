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
                        
                    </div>
                    <div class="col-8 p-3 fs-5 border border-start-0">
                        
                    </div>
                </div>
                <div class="presetting_user d-flex w-75 p-1 mt-1 mx-auto ">
                    <div class="col-4 bg-secondary text-white p-2 fs-5 border border-end-0">
                        
                    </div>
                    <div class="col-8 p-3 fs-5 border border-start-0">
                        
                    </div>
                </div>
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
