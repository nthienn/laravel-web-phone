<!-- Content Wrapper. Contains page content -->
@extends('admin.layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content-header', [
            'name' => 'Liệt Kê Danh Mục Sản Phẩm',
            'key' => 'Danh mục',
            'value' => 'Danh sách',
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
                                    <th>Tên danh mục</th>
                                    <th>Hình ảnh</th>
                                    <th>Quản lý</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $category->tendanhmuc }}</td>
                                        <td><img src="{{ asset('uploads/categories/'.$category->image) }}" width="60px"></td>
                                        <td>
                                            <a href="{{ route('categories.edit',[$category->id_danhmuc]) }}" class="btn btn-default">Sửa</a>
                                            <form action="{{ route('categories.destroy',[$category->id_danhmuc]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button onclick="return confirm('Bạn có chắc chắn muốn xoá không')" class="btn btn-danger">Xoá</button>
                                            </form>
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
