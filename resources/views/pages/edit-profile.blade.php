@extends('layouts.master')

@section('title')
    <title>Website Mua Bán Điện Thoại Cũ</title>
@endsection

@section('content')
    <!-- Information -->
    <div class="form-information">
        <form method="POST" action="{{ route('user.update', [$profile->id_taikhoan]) }}">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="col l-3"></div>
                <div class="col l-6">
                    <h3 class="information-heading">Thông tin cá nhân</h3>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="information-group">
                        <label for="name" class="information-label">Họ và tên</label>
                        <input id="name" type="text" value="{{ $profile->tenkhachhang }}" name="name"
                            class="information-control @error('name') is-invalid @enderror">
                    </div>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="information-group">
                        <label for="phone" class="information-label">Số điện thoại</label>
                        <input id="phone" type="text" value="{{ $profile->dienthoai }}" name="dienthoai"
                            class="information-control @error('dienthoai') is-invalid @enderror">
                    </div>
                    @error('dienthoai')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="information-group">
                        <label for="email" class="information-label">Email</label>
                        <input id="email" type="text" value="{{ $profile->email }}" name="email"
                            class="information-control @error('email') is-invalid @enderror">
                    </div>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="information-group">
                        <label for="address" class="information-label">Địa chỉ</label>
                        <input id="address" type="text" value="{{ $profile->diachi }}" name="address"
                            class="information-control @error('address') is-invalid @enderror">
                    </div>
                    @error('address')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="information-action">
                        <button type="submit" class="information-update">Cập nhật thông tin</button>
                    </div>
                </div>
                <div class="col l-3"></div>
            </div>
        </form>
    </div>
@endsection
