@extends('layouts.master')

@section('title')
    <title>Website Mua Bán Điện Thoại Cũ</title>
@endsection

@section('content')
    <!-- Order history -->
    <div class="bill">
        <h3>Lịch Sử Đơn Hàng:</h3>
        <table width="100%" style="border-collapse: collapse; text-align: center">
            <tr>
                <th>ID</th>
                <th>Mã đơn hàng</th>
                <th>Tổng tiền</th>
                <th>Ghi chú</th>
                <th>Tình trạng</th>
                <th>Thao tác</th>
            </tr>

            @php $i = 0; @endphp
            @foreach ($orders as $order)
                @php $i++; @endphp
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $order->code_order }}</td>
                    <td style="color:#ff641e;">{{ number_format($order->total) . ' đ' }}</td>
                    <td>{{ $order->note }}</td>
                    <td>
                        @php
                            $status = ['Chờ xác nhận', 'Xác nhận', 'Đang giao hàng', 'Đã giao hàng', 'Đơn hàng bị huỷ'];
                        @endphp
                        @for ($i = 0; $i < count($status); $i++)
                            @if ($i == $order->status)
                                {{ $status[$i] }}
                            @endif
                        @endfor
                    </td>
                    <td>
                        <a href="{{ route('order-detail', $order->id_order) }}" class="bill-view">Xem chi tiết</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
