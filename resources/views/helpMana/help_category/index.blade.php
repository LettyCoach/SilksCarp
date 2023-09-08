@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/helpMana/help_category.css') }}">
    <div class="pagetitle">
        <h1>ヘルプカテゴリー</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active">ヘルプ</li>
                <li class="breadcrumb-item active">カテゴリー</li>
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

                        <a class="rounded btn btn-danger" href="{{ route('help-category.create') }}">
                            <i class="fa fa-plus"></i>&nbsp;
                            カテゴリー追加
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
                                        <th class="text-center">タイトル</th>
                                        <th class="text-center">変更</th>
                                        <th class="text-center">削除</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($models as $i => $model)
                                        <tr class="align-middle">
                                            <td class="text-center view-data">
                                                <a
                                                    href="{{ route('help-category.show', ['help_category' => $model->id]) }}">
                                                    {{ $i + 1 }}
                                                </a>
                                            </td>
                                            <td class="text-center view-data">
                                                <a
                                                    href="{{ route('help-category.show', ['help_category' => $model->id]) }}">
                                                    {{ $model->name }}
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a
                                                    href="{{ route('help-category.edit', ['help_category' => $model->id]) }}">
                                                    <i class="bi-pencil-square"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <form method="POST"
                                                    action="{{ route('help-category.destroy', ['help_category' => $model->id]) }}">
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
        const indexUrl = "{{ route('help-category.index') }}";
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
