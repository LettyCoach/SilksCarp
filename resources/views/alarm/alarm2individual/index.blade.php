@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/alarm/a2i.css') }}">
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
                        <div class="rounded-md">
                            <select name="selType" class="form-select" id="selType" onchange="viewIndex()">
                                <option value="-1" selected>全て(種別)</option>
                                @foreach (Config::get('app.alarmTypes_I') as $k => $v)
                                    <option value="{{ $k }}" {{ $k == $selType ? 'selected' : '' }}>
                                        {{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="rounded-md">
                            <select name="selUser" class="form-select" id="selUser" onchange="viewIndex()">
                                <option value="-1" selected>全て(ユーザー)</option>
                                @foreach ($users as $v)
                                    <option value="{{ $v->id }}" {{ $v->id == $selUser ? 'selected' : '' }}>
                                        {{ $v->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="rounded-md">
                            <select name="selState" class="form-select" id="selState" onchange="viewIndex()">
                                <option value="-1" selected>全て(状態)</option>
                                @foreach (Config::get('app.alarmStates_I') as $k => $v)
                                    <option value="{{ $k }}" {{ $k == $selType ? 'selected' : '' }}>
                                        {{ $v }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="rounded-md">
                            <input type="date" name="selRead_date" id="selRead_date" class="form-control rounded"
                                value="{{ $today }}" placeholder="" />
                        </div>

                        <a class="rounded btn btn-success" href="javascript:;viewIndex()">
                            <i class="bi-search"></i>&nbsp;
                            データの表示
                        </a>
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
                                        <th class="text-center">種別</th>
                                        <th class="text-center">タイトル</th>
                                        <th class="text-center">詳細</th>
                                        <th class="text-center">発行日</th>
                                        <th class="text-center">表示期間</th>
                                        <th class="text-center">変更</th>
                                        <th class="text-center">削除</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($models as $i => $model)
                                        <tr class="align-middle">
                                            <td class="text-center view-data">
                                                <a href="{{ route('a2i.show', ['a2i' => $model->id]) }}">
                                                    {{ $i + 1 }}
                                                </a>
                                            </td>
                                            <td class="text-center view-data">
                                                <a href="{{ route('a2i.show', ['a2i' => $model->id]) }}">
                                                    {{ $model->getTypeName() }}
                                                </a>
                                            </td>
                                            <td class="text-center view-data">
                                                <a href="{{ route('a2i.show', ['a2i' => $model->id]) }}">
                                                    {{ $model->title }}
                                                </a>
                                            </td>
                                            <td class="text-center view-data">{{ $model->description }}</td>
                                            <td class="text-center view-data">{{ $model->getStartDate() }}</td>
                                            <td class="text-center view-data">{{ $model->getEndDate() }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('a2i.edit', ['a2i' => $model->id]) }}">
                                                    <i class="bi-pencil-square"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <form method="POST"
                                                    action="{{ route('a2i.destroy', ['a2i' => $model->id]) }}">
                                                    @csrf
                                                    @method('DELETE')

                                                    <div class="form-group">
                                                        <button type="submit" class="btn delete-button">
                                                            <i class="bi-trash"></i>
                                                        </button>
                                                    </div>
                                                </form>
                                            </td>
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
        const indexUrl = "{{ route('a2i.index') }}";
        const viewIndex = () => {
            const pageSize = $('#pageSize').val();
            location.href = `${indexUrl}?pageSize=${pageSize}`;
        };

        $(".delete-button").click(function(e) {
            e.preventDefault();
            if (confirm("本当に削除しますか？")) {
                $(e.target).closest("form").submit();
            }
        });
    </script>
@endsection
