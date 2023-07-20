@extends('layouts.master')

@section('title')
    <title>Website Mua Bán Điện Thoại Cũ</title>
@endsection

@section('content')
    <!-- Information -->
    <div class="form-information">
        <form method="POST" action="{{ route('update-password') }}">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col l-3"></div>
                <div class="col l-6">
                    <h3 class="information-heading">Đổi mật khẩu</h3>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="information-group">
                        <label for="password" class="information-label">Mật khẩu hiện tại</label>
                        <input id="password" type="password" name="password"
                            class="information-control-pass @error('password') is-invalid @enderror">
                    </div>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @if (session('danger'))
                        <div class="alert alert-danger">
                            {{ session('danger') }}
                        </div>
                    @endif

                    <div class="information-group">
                        <label for="password_new" class="information-label">Mật khẩu mới</label>
                        <input id="password_new" type="password" name="password_new"
                            class="information-control-pass @error('password_new') is-invalid @enderror">
                    </div>
                    @error('password_new')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="information-group">
                        <label for="password_confirmation" class="information-label">Nhập lại mật khẩu</label>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            class="information-control-pass @error('password_confirmation') is-invalid @enderror">
                    </div>
                    @error('password_confirmation')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="information-action">
                        <button type="submit" class="information-convert">Đổi mật khẩu</button>
                    </div>
                </div>
                <div class="col l-3"></div>
            </div>
        </form>
    </div>
@endsection
