@extends('layouts.master')

@section('title')
    <title>Website Mua Bán Điện Thoại Cũ</title>
@endsection

@section('content')
    <!-- Register -->
    <div class="welcome">
        <div class="row">
            <div class="background l-6">
                <img src="{{ asset('home/images/welcome.png') }}" alt="">
            </div>

            <form action="{{ route('user.store') }}" method="POST" class="form l-6">
                @csrf
                <h3 class="form-heading">Đăng ký</h3>
                <p class="form-desc">Chào mừng bạn ❤️</p>

                <div class="spacer"></div>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="form-group">
                    <label for="name" class="form-label">Họ và tên</label>
                    <input id="name" name="name" type="text" placeholder="Nhập họ và tên" 
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="dienthoai" class="form-label">Số điện thoại</label>
                    <input id="dienthoai" name="dienthoai" type="tel" placeholder="Nhập số điện thoại"
                        class="form-control @error('dienthoai') is-invalid @enderror" value="{{ old('dienthoai') }}">
                    @error('dienthoai')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input id="email" name="email" type="email" placeholder="Nhập email của bạn"
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input id="address" name="address" type="text" placeholder="Nhập địa chỉ của bạn"
                        class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
                    @error('address')
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

                <div class="form-group">
                    <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
                    <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu"
                        type="password" class="form-control @error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="form-submit">Đăng ký</button>

                <div class="form-no">
                    Bạn đã có tài khoản?
                    <a href="{{ route('user-login') }}">Đăng nhập ngay</a>
                </div>
            </form>
        </div>
    </div>
@endsection
