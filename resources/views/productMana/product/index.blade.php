@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/productMana/product.css') }}">
    <div class="pagetitle">
        <h1>商品</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active">商品</li>
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

                        <a class="rounded btn btn-danger" href="{{ route('product.create') }}">
                            <i class="fa fa-plus"></i>&nbsp;
                            商品追加
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
                                        <th class="text-center">写真</th>
                                        <th class="text-center">タイトル</th>
                                        <th class="text-center">価格(円)</th>
                                        <th class="text-center">説明</th>
                                        <th class="text-center">仕入れ値(円)</th>
                                        <th class="text-center">仕入先URL</th>
                                        <th class="text-center">変更</th>
                                        <th class="text-center">削除</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($models as $i => $model)
                                        <tr class="align-middle">
                                            <td class="text-center view-data">
                                                <a href="{{ route('product.show', ['product' => $model->id]) }}">
                                                    {{ $i + 1 }}
                                                </a>
                                            </td>
                                            <td class="text-center view-data">
                                                <a href="{{ route('product.show', ['product' => $model->id]) }}">
                                                    {{ $model->name }}
                                                </a>
                                            </td>
                                            <td class="text-center view-data">
                                                <a href="{{ route('product.show', ['product' => $model->id]) }}">
                                                    <img src="{{ $model->getImageUrlFirst() }}" class="product_img"
                                                        alt="">
                                                </a>
                                            </td>
                                            <td class="text-center view-data">{{ number_format($model->price) }}</td>
                                            <td class="text-center view-data">{{ $model->description }}</td>
                                            <td class="text-center view-data">{{ number_format($model->cost) }}</td>
                                            <td class="text-center view-data">{{ $model->supplier_url }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('product.edit', ['product' => $model->id]) }}">
                                                    <i class="bi-pencil-square"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <form method="POST"
                                                    action="{{ route('product.destroy', ['product' => $model->id]) }}">
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
        const indexUrl = "{{ route('product.index') }}";
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
