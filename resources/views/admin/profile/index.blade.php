<!-- Content Wrapper. Contains page content -->
@extends('admin.layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content-header', [
            'name' => 'Quản Lý Thông Tin Admin',
            'key' => 'Admin',
            'value' => 'Tài khoản',
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
                <div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Họ và tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Email</th>
                                    <th>Địa chỉ</th>
                                    <th>Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admin as $key => $profile)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $profile->name }}</td>
                                        <td>{{ $profile->phone }}</td>
                                        <td>{{ $profile->email }}</td>
                                        <td>{{ $profile->address }}</td>
                                        <td>
                                            <a href="{{ route('profile.edit',[$profile->id_admin]) }}" class="btn btn-default">Sửa</a>
                                            {{-- <form action="{{ route('profile.destroy',[$profile->id_admin]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return confirm('Bạn có chắc chắn muốn xoá không')" class="btn btn-danger">Xoá tài khoản</button>
                                            </form> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
