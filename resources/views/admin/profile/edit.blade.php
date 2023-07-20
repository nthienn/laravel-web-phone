<!-- Content Wrapper. Contains page content -->
@extends('admin.layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content-header', [
            'name' => 'Cập Nhật Thông Tin Admin',
            'key' => 'Admin',
            'value' => 'Sửa',
        ])
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card card-primary">
                    <form method="POST" action="{{ route('profile.update',[$profile->id_admin]) }}">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputName">Họ và tên</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" name="name" value="{{ $profile->name }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPhone">Số điện thoại</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="exampleInputPhone" name="phone" value="{{ $profile->phone }}">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" name="email" value="{{ $profile->email }}">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputAddress">Địa chỉ</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="exampleInputAddress" name="address" value="{{ $profile->address }}">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật Thông Tin</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
