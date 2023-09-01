@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/productMana/sale_info.css') }}">
    <div class="pagetitle">
        <h1>売却　</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active">情報</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="card">
                <div class="panel-heading">
                    <div class="d-flex justify-content-between flex-wrap items-center mb-2 mt-4">
                        <div class="rounded-md">
                            <select name="pageSize" class="form-select" id="pageSize" onchange="viewIndex()">
                                @foreach (Config::get('app.pageSizes') as $value)
                                    <option value="{{ $value }}" {{ $value == $pageSize ? 'selected' : '' }}>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="rounded-md ">
                            <select name="state" class="form-select" id="state" onchange="viewIndex()">
                                <option value="-1" {{ $state == -1 ? 'selected' : '' }}>全て見る</option>
                                @foreach (Config::get('app.withdrawableStates') as $key => $value)
                                    <option value="{{ $key }}" {{ $key == $state ? 'selected' : '' }}>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <a class="rounded btn btn-warning" href="javascript:;exportCSV()">
                                <i class="fa fa-cloud-download" aria-hidden="true"></i>
                                CSV
                            </a>
                        </div>
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
                                        <th class="text-center">買い手</th>
                                        <th class="text-center">価格(円)</th>
                                        <th class="text-center">銀行名</th>
                                        <th class="text-center">口座番号</th>
                                        <th class="text-center">申請日</th>
                                        <th class="text-center">状態</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($models as $i => $model)
                                        <tr class="align-middle">
                                            <td class="text-center view-data">
                                                {{ $i + 1 }}
                                            </td>
                                            <td class="text-center view-data">
                                                {{ $model->user->name }}
                                            </td>
                                            <td class="text-center view-data">
                                                {{ $model->money_real }}
                                            </td>
                                            <td class="text-center view-data">
                                                {{ $model->money->bankName }}
                                            </td>
                                            <td class="text-center view-data">
                                                {{ $model->money->accountNum }}
                                            </td>
                                            <td class="text-center view-data">
                                                {{ $model->getTradeDate() }}
                                            </td>
                                            <td class="text-center view-data">
                                                @if ($model->isWithdrawableState())
                                                    出金可能
                                                @else
                                                    出金待ち
                                                @endif
                                            </td>
                                            {{-- <td class="text-center view-data">{{ $model->product->price }}</td> --}}
                                            {{-- <td class="text-center view-data">{{ $model->getTradeDate() }}</td> --}}
                                        </tr>
                                    @endforeach

                                    @if ($models->count() == 0)
                                        <tr class="align-middle">
                                            <td class="text-center" colspan='11'>
                                                データはありません。
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class="" style="min-width: 700px">
                                {{ $models->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        const indexUrl = "{{ route('withdraw-info.list') }}";
        const viewIndex = () => {
            const pageSize = $('#pageSize').val();
            const state = $('#state').val();
            location.href = `${indexUrl}?pageSize=${pageSize}&state=${state}`;
        };

        function exportCSV() {
            let _url = "{{ route('withdraw-info.csv') }}";

            alert('ok');
            const pageSize = $('#pageSize').val();
            const stDate = $('#stDate').val();
            const edDate = $('#edDate').val();
            _url = `${_url}?pageSize=${pageSize}&stDate=${stDate}&edDate=${edDate}`;

            window.location.href = _url;
        }
    </script>
@endsection
