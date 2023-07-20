@extends('layouts.master')

@section('title')
    <title>Website Mua Bán Điện Thoại Cũ</title>
@endsection

@section('content')
    <div class="product-management">
        <h3>Quản lý sản phẩm bán</h3>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table width="100%" style="border-collapse: collapse; text-align: center">
            <tr>
                <th>ID</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá sản phẩm</th>
                <th>Số lượng</th>
                <th>Danh mục</th>
                <th>Địa điểm</th>
                <th>Nội dung</th>
                <th>Quản lý</th>
            </tr>
            @php
                $i = 0;
            @endphp
            @foreach ($products as $key => $product)
                @php
                    $i++;
                @endphp
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $product->tensanpham }}</td>
                    <td><img src="{{ asset('uploads/products/' . $product->hinhanh) }}" width="100px"></td>
                    <td>{{ number_format($product->giasanpham) . ' đ' }}</td>
                    <td>{{ $product->soluong }}</td>
                    <td>{{ $product->tendanhmuc }}</td>
                    <td>{{ $product->diadiem }}</td>
                    <td>{{ $product->noidung }}</td>
                    <td>
                        <a href="{{ route('product.edit',[$product->id_sanpham]) }}" class="btn btn-default">Sửa</a>
                        <form action="{{ route('product.destroy',[$product->id_sanpham]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button onclick="return confirm('Xác nhận xoá sản phẩm?')" class="btn btn-danger">Xoá</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection