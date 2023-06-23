@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/messageMana/message.css') }}">
    <div class="pagetitle">
        <h1>お知らせ</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item active">お知らせ</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row d-flex justify-content-center">
            <div class="col col-md-9 col-xl-8">
                <div class="card p-4">
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
                                <select name="selUser_id" class="form-select" id="selUser_id" onchange="viewIndex()">
                                    <option value="-1" selected>全て(ユーザー)</option>
                                    @foreach ($users as $v)
                                        <option value="{{ $v->id }}" {{ $v->id == $selUser_id ? 'selected' : '' }}>
                                            {{ $v->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <span class="badge bg-success badge-number" style="height:20px">5</span>

                            <a class="rounded btn btn-success d-none" href="javascript:;viewIndex()">
                                <i class="bi-search"></i>&nbsp;
                                データの表示
                            </a>
                        </div>
                    </div>
                    <div class="card-body pb-0">

                        <div class="row d-flex justify-content-center">
                            <div class="col col-lg-8">
                                <div class="news mt-5">
                                    <div class="post-item clearfix">
                                        <img src="{{ Auth::user()->getAvatar() }}" alt="">
                                        <h4><a href="#">{{ Auth::user()->name }}</a></h4>
                                        <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="{{ Auth::user()->getAvatar() }}" alt="">
                                        <h4><a href="#">{{ Auth::user()->name }}</a></h4>
                                        <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...
                                        </p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="{{ Auth::user()->getAvatar() }}" alt="">
                                        <h4><a href="#">{{ Auth::user()->name }}</a></h4>
                                        <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...
                                        </p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="{{ Auth::user()->getAvatar() }}" alt="">
                                        <h4><a href="#">{{ Auth::user()->name }}</a></h4>
                                        <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...
                                        </p>
                                    </div>

                                    <div class="post-item clearfix">
                                        <img src="{{ Auth::user()->getAvatar() }}" alt="">
                                        <h4><a href="#">{{ Auth::user()->name }}</a></h4>
                                        <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos
                                            eius...
                                        </p>
                                    </div>

                                </div><!-- End sidebar recent posts-->
                            </div>
                        </div>


                        <div class="" style="min-width: 700px">
                            {{ $models->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('js')
    <script>
        const indexUrl = "{{ route('message.index') }}";
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
