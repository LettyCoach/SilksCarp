@extends('layouts.user')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/alarm/alarm_user.css') }}">
    <div class="pagetitle">
        <h1>お知らせ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active">お知らせ</li>
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
                        <div class="rounded-md d-flex">
                            <select name="selType" class="form-select" id="selType" onchange="viewIndex()">
                                <option value="-1" selected>全て(種別)</option>
                                @foreach (Config::get('app.alarmTypes_I') as $k => $v)
                                    <option value="{{ $k }}" {{ $k == $selType ? 'selected' : '' }}>
                                        {{ $v }}</option>
                                @endforeach
                            </select>
                            &nbsp;&nbsp;&nbsp;
                        </div>
                        <div class="rounded-md">

                            <select name="selState" class="form-select" id="selState" onchange="viewIndex()">
                                <option value="-1" selected>全て(読んだ状態)</option>
                                @foreach (Config::get('app.alarmStates_I') as $k => $v)
                                    <option value="{{ $k }}" {{ $k == $selState ? 'selected' : '' }}>
                                        {{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="rounded-md">

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
                                        <th class="text-center">読んだ状態</th>
                                        <th class="text-center">種別</th>
                                        {{-- <th class="text-center">詳細</th> --}}
                                        <th class="text-center">発行日</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($models as $i => $model)
                                        <tr class="align-middle">
                                            <td class="text-center view-data p-3">
                                                <a href="{{ route('alarm-indi.show', ['alarm_indi' => $model->id]) }}">
                                                    {{ $i + 1 }}
                                                </a>
                                            </td>
                                            <td class="text-center view-data">
                                                <a href="{{ route('alarm-indi.show', ['alarm_indi' => $model->id]) }}">
                                                    @if ($model->read_date === '2000-01-01 00:00:00')
                                                        未読
                                                    @else
                                                        読む
                                                    @endif
                                                </a>
                                            </td>
                                            <td class="text-center view-data">
                                                <a href="{{ route('alarm-indi.show', ['alarm_indi' => $model->id]) }}">
                                                    @if ($model->type === 0)
                                                        <i class="bi bi-info-circle text-primary"></i>
                                                    @else
                                                        <i class="bi bi-exclamation-circle text-warning"></i>
                                                    @endif
                                                    {{ $model->getTypeName() }}
                                                </a>
                                            </td>
                                            {{-- <td class="text-center view-data">
                                                <a href="{{ route('alarm-indi.show', ['alarm_indi' => $model->id]) }}">
                                                    {{ $model->description }}
                                                </a>
                                            </td> --}}
                                            <td class="text-center view-data">{{ $model->getStartDate() }}</td>
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
        const indexUrl = "{{ route('alarm-indi.index') }}";
        const viewIndex = () => {
            const pageSize = $('#pageSize').val();
            const selType = $('#selType').val();
            const selState = $('#selState').val();
            location.href = `${indexUrl}?pageSize=${pageSize}&selType=${selType}&selState=${selState}`;
        };
    </script>
@endsection
