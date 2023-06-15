<table id="dtBasicExample" class="table table-striped table-fixed table-bordered table-sm" cellspacing="0"
    style="min-width: 1000px; overflow-x: scroll; width:100%">
    <thead style="height:47px;">
        <tr class="align-middle">
            <th class="text-center">No</th>
            <th class="text-center">写真</th>
            <th class="text-center">タイトル</th>
            <th class="text-center">価格</th>
            <th class="text-center">説明</th>
            <th class="text-center">仕入れ値</th>
            <th class="text-center">仕入先URL</th>
            <th class="text-center">変更</th>
            <th class="text-center">削除</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($models as $i => $model)
            <tr class="align-middle">
                <td class="text-center"><span class="">{{ $stNo + $i }}</span></td>
                <td class="text-xs text-center">{{ $model->name }}</td>
                <td class="text-center">{{ $model->name }}</td>
                <td class="text-center">{{ $model->price }}</td>
                <td class="text-center">{{ $model->description }}</td>
                <td class="text-center">{{ $model->cost }}</td>
                <td class="text-center">{{ $model->supplier_url }}</td>
                <td class="text-center">
                    <a href="javascript:;register(1, 1)"><i class="bi-pencil-square"></i></a>
                </td>
                <td class="text-center">
                    <a href="javascript:;cancel(1)"><i class="bi-trash"></i></a>
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
<div class="d-flex justify-content-between" style="min-width: 700px">
    {!! $links !!}
</div>
