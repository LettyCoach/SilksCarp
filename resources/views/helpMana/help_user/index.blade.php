@extends('layouts.user')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/helpMana/help.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/choices.js/1.1.6/styles/css/choices.css">
    <div class="pagetitle">
        <h1>お知らせ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active">ヘルプ</li>
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
                        <div class="d-flex align-items-center">
                        <div class="rounded-md me-2">
                            <select id="categories" placeholder="Select up to 3 tags" multiple>
                                <option value=""></option>
                                @foreach ($helpCategories as $c)
                                    <option value="{{ $c->id }}"
                                        {{ array_search($c->id, explode(',', $categories)) === false ? '' : 'selected' }}>
                                        {{ $c->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="rouneded-md me-5">
                            <a class="rounded btn btn-primary" href="javascript:;viewIndex()">
                                <i class="fa fa-search"></i>&nbsp;
                                ヘルプ
                            </a>
                        </div>
    </div>
                        {{-- <div class="rouneded-md">
                            <a class="rounded btn btn-danger" href="{{ route('help.create') }}">
                                <i class="fa fa-plus"></i>&nbsp;
                                ヘルプ追加
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div class="panel-body">
                    <div style="min-height: calc(100vh - 360px)">
                        <div class="table-responsive" id="data_div">
                            <table id="dtBasicExample" class="table table-striped table-fixed table-bordered table-sm"
                                cellspacing="0" style="min-width: 1000px; overflow-x: scroll; width:100%">
                                <thead style="height:47px;">
                                    <tr class="align-middle">
                                        <th class="text-center">表示順番</th>
                                        <th class="text-center">タイトル</th>
                                        <th class="text-center">本文</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($models as $i => $model)
                                        <tr class="align-middle">
                                            <td class="text-center view-data">
                                                <a href="{{ route('help.user_show', ['id' => $model->id]) }}">
                                                    {{ $model->display_order }}
                                                </a>
                                            </td>
                                            <td class="text-center view-data">
                                                <a href="{{ route('help.user_show', ['id' => $model->id]) }}">
                                                    {{ $model->title }}
                                                </a>
                                            </td>
                                            <td class="text-center view-data">
                                                <a href="{{ route('help.user_show', ['id' => $model->id]) }}">
                                                    {{ $model->content }}
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/choices.js/1.1.6/choices.min.js"></script>
    <script>
        const indexUrl = "{{ route('help.user') }}";
        const viewIndex = () => {
            const pageSize = $('#pageSize').val();
            const categories = $('#categories').val();
            console.log(categories);
            location.href = `${indexUrl}?pageSize=${pageSize}&categories=${categories}`;
        };

        $(".delete-button").click(function(e) {
            e.preventDefault();
            if (confirm("本当に削除しますか？")) {
                $(e.target).closest("form").submit();
            }
        });

        $(document).ready(function() {

            var multipleCancelButton = new Choices('#categories', {
                removeItemButton: true,
                maxItemCount: 3,
                searchResultLimit: 5,
                renderChoiceLimit: 5
            });
        });
    </script>
@endsection
