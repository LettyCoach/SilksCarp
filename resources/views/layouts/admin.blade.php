@php
    use Illuminate\Support\Facades\Route;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '錦鯉') }}</title>

    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Favicons -->
    <link href="{{ asset('assets/images/topPage/favicon.svg') }}" rel="icon">
    <link href="{{ asset('assets/niceAdmin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/niceAdmin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/niceAdmin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/niceAdmin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/niceAdmin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/niceAdmin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/niceAdmin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/niceAdmin/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/niceAdmin/css/style.css') }}" rel="stylesheet">

</head>

@php
    $unreadMSGs = Auth::user()->getUnreadMessages();
@endphp

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('home') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/images/topPage/logo.png') }}" alt=""
                    style="width:42px; height:42px; max-height:42px">
                <span class="d-none d-lg-block">SilksCarp</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->


        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">{{ count($unreadMSGs) }}</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have {{ count($unreadMSGs) }} new messages
                            <a href="{{ route('message-admin.index') }}"><span
                                    class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        @foreach ($unreadMSGs as $msg)
                            <li class="message-item">
                                <a href="{{ route('message-admin.edit', ['message_admin' => $msg['msg_id']]) }}">
                                    <img src="{{ $msg['avatar'] }}" alt="" class="rounded-circle">
                                    <div>
                                        <h4>{{ $msg['name'] }}</h4>
                                        <p>{{ $msg['title'] }}</p>
                                        <p>{{ $msg['time'] }}</p>
                                    </div>
                                </a>
                            </li>
                        @endforeach

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="{{ route('message-admin.index') }}">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset(Auth::user()->getAvatar()) }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>管理者</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    @php
        $routeName = Route::currentRouteName();
    @endphp

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ $routeName == 'home' ? '' : 'collapsed' }}" href="{{ route('home') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link {{ $routeName == 'product.index' ? '' : 'collapsed' }} "
                    href="{{ route('product.index') }}">
                    <i class="bi bi-boxes"></i>
                    <span>商品</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ $routeName == 'sale-info.index' ? '' : 'collapsed' }} "
                    href="{{ route('sale-info.index') }}" data-bs-target="#sale_info" data-bs-toggle="collapse" aria-expanded="false">
                    <i class="bi bi-clipboard2-pulse"></i><span>販売情報</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="sale_info" class="nav-content" >
                    <li>
                        <a href="{{ route('sale-info.index') }}">
                            {{-- <i class="fa fa-calculator" aria-hidden="true"></i> --}}
                            販売情報一覧
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('sale-info.tariff') }}">
                            {{-- <i class="fa fa-calculator" aria-hidden="true"></i> --}}
                            手数料タリフ
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('withdraw-info.index') }}">
                    <i class="bi bi-bank"></i>
                    <span>出金情報</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link {{ $routeName == 'a2a.index' || $routeName == 'a2i.index' ? '' : 'collapsed' }}"
                    data-bs-target="#index_components-nav" data-bs-toggle="collapse" href="#" aria-expanded="false" >
                    <i class="bi bi-bell-fill"></i><span>お知らせ管理</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="index_components-nav"
                    class="nav-content  {{ $routeName == 'a2a.index' || $routeName == 'a2i.index' ? '' : 'collapsed' }} "
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="{{ $routeName == 'a2a.index' ? 'active' : '' }}" href="{{ route('a2a.index') }}">
                            <i class="bi bi-circle"></i><span>全体へのお知らせ</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ $routeName == 'a2i.index' ? 'active' : '' }}" href="{{ route('a2i.index') }}">
                            <i class="bi bi-circle"></i><span>個別お知らせ</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->

            <li class="nav-item">
                <a class="nav-link {{ $routeName == 'message-sub.index' ? '' : 'collapsed' }} "
                    href="{{ route('message-admin.index') }}">
                    <i class="bi bi-chat-left-text"></i>
                    <span>メッセージ管理</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ $routeName == 'help-category.index' || $routeName == 'help.index' ? '' : 'collapsed' }} "
                    data-bs-target="#help_components-nav" data-bs-toggle="collapse" href="#" aria-expanded="false">
                    <i class="fa fa-question-circle-o" aria-hidden="true"></i><span>ヘルプ管理</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="help_components-nav"
                    class="nav-content  {{ $routeName == 'help-category.index' || $routeName == 'help.index' ? '' : 'collapsed' }} "
                    data-bs-parent="#sidebar-nav">
                    <li>
                        <a class="{{ $routeName == 'help-category.index' ? 'active' : '' }}"
                            href="{{ route('help-category.index') }}">
                            <i class="bi bi-circle"></i><span>カテゴリ</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{ $routeName == 'help.index' ? 'active' : '' }}"
                            href="{{ route('help.index') }}">
                            <i class="bi bi-circle"></i><span>ヘルプ</span>
                        </a>
                    </li>
                </ul>
            </li><!-- End Components Nav -->
        </ul>

    </aside><!-- End Sidebar-->

    <main id="main" class="main">
        @yield('content')
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>SilksCarp</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            {{-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> --}}
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/niceAdmin/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/niceAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/niceAdmin/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/niceAdmin/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/niceAdmin/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/niceAdmin/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/niceAdmin/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/niceAdmin/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/niceAdmin/js/main.js') }}"></script>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    @yield('js')

</body>

</html>
