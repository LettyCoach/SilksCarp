@php
    $layout = Auth::user()->role == 'admin' ? 'admin' : 'user';
@endphp
@extends("layouts.$layout")

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('ログインしています。!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
