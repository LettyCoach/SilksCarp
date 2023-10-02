@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/productMana/sale_info.css') }}">
    <div class="pagetitle">
        <h1>タリフ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active">タリフ</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="card">
                <div class="panel-body">
                    <div style="min-height: calc(100vh - 360px)">
                        <div class="table-responsive p-4" id="data_div">
                            <form action="{{ route('sale-info.tariff.update') }}" method="post">
                                @csrf
                                <table id="dtBasicExample" class="table table-striped table-fixed table-bordered table-sm mt-4"
                                    cellspacing="0" style="min-width: 1000px; overflow-x: scroll; width:100%">
                                    <thead style="height:47px;">
                                        <tr class="align-middle">
                                            <th class="text-center">買取手数料(円)</th>
                                            <th class="text-center">買取保証金額(%)</th>
                                            <th class="text-center">手数料(%)</th>
                                            <th class="text-center">支払額(%)</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($tariffs as $key => $tariff)
                                        <tr>
                                            <td class="text-center">{{ $tariff->title }}</td>
                                            <td class="text-center">
                                                <input class="border-0 bg-transparent guarantee-input" type="number" name="tariffs[{{ $key }}][guarantee]" value="{{ $tariff->guarantee }}" max="100" min="0" data-key="{{ $key }}">
                                            </td>
                                            <td class="text-center">
                                                <input class="border-0 bg-transparent fee-input" type="number" name="tariffs[{{ $key }}][fee]" value="{{ $tariff->fee }}" max="100" min="0" data-key="{{ $key }}">
                                            </td>
                                            <td class="text-center">
                                                <input class="border-0 bg-transparent paid" type="number" name="tariffs[{{ $key }}][paid]"  value="{{ $tariff->paid }}" max="100" min="0" data-key="{{ $key }}">
                                            </td>
                                            <input type="hidden" name="tariffs[{{ $key }}][id]" value="{{ $tariff->id }}">
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col d-flex justify-content-center">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi-list-stars"></i> 確認
                                        </button>
                                    </div>
                                </div>
                            </form>
                                    
                                @if(session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                {{-- <button id="submit">Submit</button> --}}
                            <div class="" style="min-width: 700px">
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
        $(document).ready(function () {
            $('.guarantee-input, .fee-input').on('input', function () {
                var key = $(this).data('key');
                var guarantee = parseFloat($('input[name="tariffs[' + key + '][guarantee]"]').val());
                var fee = parseFloat($('input[name="tariffs[' + key + '][fee]"]').val());
                var total = guarantee - fee;
                $('input[name="tariffs[' + key + '][paid]"]').val(total);
            });
        });
    </script>
@endsection
