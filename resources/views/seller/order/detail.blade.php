@extends('layouts.master')

@section('title')
    <title>Website Mua Bán Điện Thoại Cũ</title>
@endsection

@section('content')
    <div class="product-management">
        <h3>Chi Tiết Đơn Hàng:</h3>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table width="100%" style="border-collapse: collapse; text-align: center">
            <tr>
                <th>Hình ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Đơn giá</th>
                <th>Số lượng</th>
            </tr>

            @foreach ($order_detail as $value)
                <tr>
                    <td rowspan="3"><img src="{{ asset('uploads/products/' . $value->hinhanh) }}" width="150px"></td>
                    <td>{{ $value->tensanpham }}</td>
                    <td>{{ number_format($value->price) . ' đ' }}</td>
                    <td>{{ $value->quantity }}</td>
                </tr>

                <form action="{{ route('update-order', $value->id_order) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <tr>
                        {{-- <td>&nbsp;</td> --}}
                        <td colspan="3">
                            Tình trạng
                            <select name="status">
                                @php
                                    $status = ['Chờ xác nhận', 'Xác nhận', 'Đang giao hàng', 'Đã giao hàng', 'Huỷ đơn hàng'];
                                @endphp
                                @for ($i = 0; $i < count($status); $i++)
                                    <option {{ $order->status == $i ? 'selected' : '' }} value="{{ $i }}">
                                        {{ $status[$i] }}
                                    </option>
                                @endfor
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><button type="submit">Cập nhật</button></td>
                    </tr>
                </form>
            @endforeach
        </table>

        <div class="bill-detail-alert">
            <a href="{{ route('order-seller') }}">Quay lại quản lý đơn hàng?</a>
        </div>
    </div>
@endsection
