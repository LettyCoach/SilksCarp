@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>商品</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
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
                            <select name="pageSize" class="form-select" id="pageSize" onchange="viewDataTable()">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15" selected>15</option>
                                <option value="20">20</option>
                            </select>
                        </div>

                        <button class="rounded btn btn-danger" onclick="showDataModal()">
                            <i class="fa fa-plus"></i>&nbsp;
                            商品追加
                        </button>
                    </div>
                </div>
                <div class="panel-body">
                    <div style="min-height: calc(100vh - 360px)">
                        <div class="table-responsive" id="data_div">

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="dataModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">出荷指示追加</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <p id="oxId" class="d-none"></p>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">牧場選択</label>
                                <input type="text" id="oxNameById" class="form-control rounded" disabled />
                            </div>
                            <div class="col">
                                <label for="">運送会社選択</label>
                                <input type="text" id="oxNameById" class="form-control rounded" disabled />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">牛選択</label>
                                <input type="text" id="oxNameById" class="form-control rounded" disabled />
                            </div>
                            <div class="col">
                                <label for="">和牛登録名</label>
                                <input type="text" id="oxNameById" class="form-control rounded" disabled />
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col">
                                <label for="">出荷日</label>
                                <input type="text" id="oxNameById" class="form-control rounded" disabled />
                            </div>
                            <div class="col">
                                <label for="">行き先選択</label>
                                <input type="text" id="oxNameById" class="form-control rounded" disabled />
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" style="background-color: #6ea924; border: 0;"
                            onclick="addShip()">
                            <i class="fa fa-check"></i> セーブ
                        </button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fa fa-times"></i>閉じる
                        </button>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection

@section('js')
    <script src="{{ asset('assets/js/productMana/product.js') }}"></script>
@endsection
