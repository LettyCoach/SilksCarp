@extends('layouts.app')

@section('content')
    <div class="container">

        <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
            <h1>404</h1>
            <h2>お探しのページは存在しません。</h2>
            <a class="btn" href="{{ route('home') }}">Back to home</a>
            <img src="{{ asset('assets/images/common/not-found.svg') }}" class="img-fluid py-5" alt="Page Not Found">
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
            </div>
        </section>

    </div>
@endsection
