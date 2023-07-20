@extends('layouts.master')

@section('title')
    <title>Website Mua Bán Điện Thoại Cũ</title>
@endsection

@section('content')
    <!-- Login -->
    <div class="welcome">
        <div class="row">
            <div class="background l-6">
                <img src="{{ asset('home/images/welcome.png') }}" alt="">
            </div>

            <form action="{{ route('user-login') }}" method="POST" class="form l-6">
                @csrf
                <h3 class="form-heading">Đăng nhập</h3>
                <p class="form-desc">Chào mừng bạn ❤️</p>

                <div class="spacer"></div>

                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="text" placeholder="Nhập email của bạn"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">Mật khẩu</label>
                    <input id="password" name="password" type="password" placeholder="Nhập mật khẩu của bạn"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="form-submit">Đăng nhập</button>

                <div class="form-no">
                    Bạn chưa có tài khoản?
                    <a href="{{ route('user.create') }}">Đăng ký ngay</a>
                </div>
            </form>
        </div>
    </div>
@endsection
