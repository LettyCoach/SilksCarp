@extends('layouts.user')

@section('content')
    <div class="pagetitle">
        <h1>Profile</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">ホーム</a></li>
                <li class="breadcrumb-item">ユーザー情報</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section profile" style="font-family: yu gothic">
        <div class="row">
            <div class="col-xl-4">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="{{ $user->getAvatar() }}" alt="Profile" class="rounded-circle">
                        <h2>{{ $user->name }}</h2>
                        <h3>ユーザー</h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-8">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">

                            <li class="nav-item">
                                <button class="nav-link {{ $page == 0 ? 'active' : '' }}" data-bs-toggle="tab"
                                    data-bs-target="#profile-overview">情報を見る</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link {{ $page == 1 ? 'active' : '' }}"" data-bs-toggle="tab"
                                    data-bs-target="#profile-edit">プロフィール編集</button>
                            </li>

                            <li class="nav-item">
                                <button class="nav-link {{ $page == 2 ? 'active' : '' }}"" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">パスワード変更</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">

                            <div class="tab-pane fade {{ $page == 0 ? 'show active' : '' }} profile-overview"
                                id="profile-overview">
                                <h5 class="card-title">Profile Details</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">名前</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->name }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">送付先住所</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->destination_address }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Email</div>
                                    <div class="col-lg-9 col-md-8">{{ $user->email }}</div>
                                </div>

                            </div>

                            <div class="tab-pane fade {{ $page == 1 ? 'show active' : '' }} profile-edit pt-3"
                                id="profile-edit">

                                <!-- Profile Edit Form -->
                                <form action="{{ route('profile.updateProfile') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile
                                            Image</label>
                                        <div class="col-md-8 col-lg-9">
                                            <img src="{{ $user->getAvatar() }}" alt="Profile">
                                            <div class="pt-2">
                                                <a href="#" class="btn btn-primary btn-sm"
                                                    title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                <a href="#" class="btn btn-danger btn-sm"
                                                    title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-lg-3 col-form-label">名前</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="name" type="text" class="form-control" id="name"
                                                value="{{ old('name', $user->name) }}">
                                            @error('name')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="destination_address"
                                            class="col-md-4 col-lg-3 col-form-label">送付先住所</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="destination_address" type="text" class="form-control"
                                                id="destination_address" value="{{ $user->destination_address }}">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">変更</button>
                                    </div>
                                </form><!-- End Profile Edit Form -->

                            </div>

                            <div class="tab-pane fade {{ $page == 2 ? 'show active' : '' }} profile-change-password pt-3"
                                id="profile-change-password">
                                <!-- Change Password Form -->
                                <form action="{{ route('profile.updatePassword') }}" method="POST"
                                    enctype="multipart/form-data" onsubmit="">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="currentPassword" type="password" class="form-control"
                                                id="currentPassword" value="{{ old('currentPassword') }}">
                                            @error('currentPassword')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="newPassword" type="password" class="form-control"
                                                id="newPassword" value="{{ old('newPassword') }}">
                                            @error('newPassword')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                            Password</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input name="renewPassword" type="password" class="form-control"
                                                id="renewPassword" value="{{ old('renewPassword') }}">
                                            @error('renewPassword')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">変更</button>
                                    </div>
                                </form><!-- End Change Password Form -->

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
