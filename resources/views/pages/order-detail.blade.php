@extends('layouts.master')

@section('title')
    <title>Website Mua Bán Điện Thoại Cũ</title>
@endsection

@section('content')
    <div class="bill-detail">
        <h3>Chi Tiết Đơn Hàng:</h3>
        <table width="100%" style="border-collapse: collapse; text-align: center">
            <tr>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
                <th>Người bán</th>
            </tr>

            @foreach ($order_detail as $value)
            <tr>
                <td><img src="{{ asset('uploads/products/' . $value->hinhanh) }}" width="100px"></td>
                <td>{{ $value->tensanpham }}</td>
                <td>{{ number_format($value->price) . ' đ' }}</td>
                <td>{{ $value->quantity }}</td>
                <td>{{ $value->tenkhachhang }}</td>
            </tr>
            @endforeach
        </table>

        <div class="bill-detail-alert">
            <a href="{{ route('order-history') }}">Quay lại lịch sử đơn hàng?</a>
        </div>
    </div>
@endsection
