@extends('layouts.user')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/productMana/purchase.css') }}">
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
                                        <th class="text-center">仕入れ値(円)</th>
                                        <th class="text-center">説明</th>
                                        <th class="text-center">購入</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($models as $i => $model)
                                        <tr class="align-middle">
                                            <td class="text-center view-data">
                                                <a href="{{ route('purchase.show', ['purchase' => $model->id]) }}">{{ $i + 1 }}
                                                </a>
                                            </td>
                                            <td class="text-center view-data">
                                                <a href="{{ route('purchase.show', ['purchase' => $model->id]) }}">
                                                    {{ $model->product->name }}
                                                </a>
                                            </td>
                                            <td class="text-center view-data">
                                                <a href="{{ route('purchase.show', ['purchase' => $model->id]) }}">
                                                    <img src="{{ $model->product->getImageUrlFirst() }}"
                                                        class="product_img" alt="">
                                                </a>
                                            </td>
                                            <td class="text-center view-data">{{ $model->product->price }}</td>
                                            <td class="text-center view-data">{{ $model->product->cost }}</td>
                                            <td class="text-center view-data">{{ $model->product->description }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('purchase.create', ['id' => $model->id]) }}">
                                                    <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
                                                </a>
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
        const indexUrl = "{{ route('purchase.index') }}";
        const viewIndex = () => {
            const pageSize = $('#pageSize').val();
            location.href = `${indexUrl}?pageSize=${pageSize}`;
        };
    </script>
@endsection
