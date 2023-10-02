@extends('layouts.user')

@section('content')
    <div class="pagetitle">
        <h1>出金</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item">お金管理</li>
                <li class="breadcrumb-item">出金</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section withdraw" style="font-family: yu gothic">
        <div class="row">
            <div class="col-xl-9 mx-auto">

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
                                {{-- <h5 class="card-title">Withdraw Details</h5> --}}
                                <div class="row mt-4">
                                    <div class="col-lg-3 col-md-8 label ">銀行名</div>
                                    <div class="col-lg-9 col-md-8">{{ $money->bankName }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">口座番号</div>
                                    <div class="col-lg-9 col-md-8">{{ $money->accountNum }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">残高</div>
                                    <div class="col-lg-9 col-md-8">{{ $balance }}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade {{ $page == 1 ? 'show active' : '' }} withdraw-setting pt-3"
                                id="withdraw-setting">
                                <!-- Change Password Form -->
                                <form action="{{ route('withdraw.setting') }}" method="POST"
                                    enctype="multipart/form-data" onsubmit="">
                                    @csrf
                                    <input type="hidden" name="total_amount" id="total_amount" value="{{ $balance }}">

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
                                        <div class="col-md-8 col-lg-9" name="balance" id="balance">{{ $balance }}
                                        </div> 
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">出金する</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>
                            <div class="tab-pane fade {{ $page == 2 ? 'show active' : '' }} withdraw-go pt-3"
                                id="withdraw-go">
                                <div class="d-flex justify-content-between align-items-center">
                                <h5 class="card-title ms-2">現在の残高: &nbsp<span class=""> {{ $balance }} 円</span></h5>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('withdraw.index', ['filter' => 0 ]) }}" class="btn btn-primary me-2">全て</a>
                                    <a href="{{ route('withdraw.index', ['filter' => 1 ]) }}" class="btn btn-success me-2">出金待ち</a>
                                    <a href="{{ route('withdraw.index', ['filter' => 2 ]) }}" class="btn btn-warning me-2">出金可能</a>
                                    <a href="{{ route('withdraw.index', ['filter' => 3 ]) }}" class="btn btn-danger me-3">出金</a>
                                </div>
                                </div>
                                <div class="d-flex justify-content-between flex-wrap items-center mb-2 mt-0">
                                    <div class="rounded-md">
                                        <select name="pageSize" class="form-select" id="pageSize" onchange="viewIndex()">
                                            @foreach (Config::get('app.pageSizes') as $value)
                                                <option value="{{ $value }}" {{ $value == $pageSize ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="panel-body">
                                    <div style="min-height: calc(100vh - 360px)">
                                        <div class="table-responsive" id="data_div">
                                            <table id="dtBasicExample" class="table table-striped table-fixed table-bordered table-sm"
                                                cellspacing="0" style="min-width: 1000px; overflow-x: scroll; width:100%">
                                                <thead style="height:47px;">
                                                    <tr class="align-middle">
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">タイトル</th>
                                                        <th class="text-center">金額(合計)(円)</th>
                                                        <th class="text-center">金額(実質)(円)</th>
                                                        {{-- <th class="text-center">説明</th> --}}
                                                        <th class="text-center">分類</th>
                                                        <th class="text-center">日付</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                    <?php
                                                        $i = 0;
                                                    ?>
                                                    @foreach ($withdraw_historys as $key => $withdraw_history)
                                                        <?php 
                                                            $i++;

                                                            if($withdraw_history->state == 0) {
                                                                if($withdraw_history->type == -1) {
                                                                    if($withdraw_history->isWithdrawableState()) {
                                                                        $type = "出金可能";
                                                                    } else {
                                                                        $type = "出金待ち";
                                                                    }
                                                                }
                                                            } else {
                                                                $type = "出金";

                                                            }
                                                        ?>

                                                        <tr class="align-middle">
                                                            <td class="text-center view-data">{{ $i }}</td>
                                                            <td class="text-center view-data">{{ $withdraw_history->title }}</td>
                                                            <td class="text-center view-data">{{ $withdraw_history->money_all }}</td>
                                                            <td class="text-center view-data">{{ $withdraw_history->money_real }}</td>
                                                            {{-- <td class="text-center view-data">{{ $withdraw_history->description }}</td> --}}
                                                            <td class="text-center view-data">{{ $type }}</td>
                                                            <td class="text-center view-data">{{ $withdraw_history->trade_date }}</td>
                                                        </tr>
                                                    @endforeach

                                                    @if ($withdraw_historys->count() == 0)
                                                        <tr class="align-middle">
                                                            <td class="text-center" colspan='11'>
                                                                データはありません。
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                            <div class="" style="min-width: 700px">
                                                {{ $withdraw_historys->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

        const indexUrl = "{{ route('withdraw.index') }}";
        const viewIndex = () => {
            const pageSize = $('#pageSize').val();
            location.href = `${indexUrl}?pageSize=${pageSize}`;
        };
    </script>
@endsection