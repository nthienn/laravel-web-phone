@extends('layouts.master')

@section('title')
    <title>Website Mua Bán Điện Thoại Cũ</title>
@endsection

@section('content')
    @include('components.sidebar')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if (session('cart'))
        <!-- Cart -->
        <div class="cart">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <table width="100%" style="border-collapse: collapse; text-align: center">
                <tr>
                    <th>STT</th>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>

                @php
                    $i = 0;
                    $total = 0;
                @endphp
                @foreach (session('cart') as $key => $value)
                    @php
                        $price = $value['giasanpham'] * $value['quantity'];
                        $total += $price;
                        $i++;
                    @endphp
                    <tr>
                        <td>{{ $i }}</td>
                        <td><img src="{{ asset('uploads/products/' . $value['hinhanh']) }}" width="100px"></td>
                        <td>{{ $value['tensanpham'] }}</td>
                        <td>{{ number_format($value['giasanpham']) . ' đ' }}</td>
                        <td>{{ $value['quantity'] }}</td>
                        <td>{{ number_format($price) . ' đ' }}</td>
                        <td>
                            <a href="{{ route('remove', $value['id_sanpham']) }}" class="cart-action"
                                onclick="return confirm('Xoá sản phẩm khỏi giỏ hàng?')">
                                <i class="fa-solid fa-trash cart-icon"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

                <tr>
                    <td>&nbsp;</td>
                    <td colspan="4">Tổng tiền:</td>
                    <td style="color:#ff641e;">{{ number_format($total) . ' đ' }}</td>
                    <td>
                        <a href="{{ route('remove-all') }}" class="cart-delete-all"
                            onclick="return confirm('Xoá tất cả sản phẩm khỏi giỏ hàng?')">Xóa tất cả</a>
                    </td>
                </tr>
            </table>

            <div class="cart-alert">
                <a href="{{ URL('/') }}">Tiếp tục thêm sản phẩm vào giỏ?</a>
            </div>
        </div>

        @if (session()->has('id_taikhoan'))
            <div class="order">
                <div class="row">
                    <div class="col l-2"></div>
                    <form method="POST" action="{{ route('order') }}" class="col l-8">
                        @csrf
                        <h3 class="order-heading">Thông tin đặt hàng</h3>

                        @foreach ($user as $profile)
                            <div class="order-group">
                                <label for="name" class="order-label">Họ và tên</label>
                                <input id="name" type="text" value="{{ $profile->tenkhachhang }}" name="name"
                                    class="order-control @error('name') is-invalid @enderror">
                            </div>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="order-group">
                                <label for="phone" class="order-label">Số điện thoại</label>
                                <input id="phone" type="text" value="{{ $profile->dienthoai }}" name="phone"
                                    class="order-control @error('phone') is-invalid @enderror">
                            </div>
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="order-group">
                                <label for="email" class="order-label">Email</label>
                                <input id="email" type="text" value="{{ $profile->email }}" name="email"
                                    class="order-control @error('email') is-invalid @enderror">
                            </div>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="order-group">
                                <label for="address" class="order-label">Địa chỉ</label>
                                <input id="address" type="text" value="{{ $profile->diachi }}" name="address"
                                    class="order-control @error('address') is-invalid @enderror">
                            </div>
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        @endforeach

                        <div class="order-group">
                            <label for="note" class="order-label">Ghi chú</label>
                            <textarea id="note" cols="30" rows="10" name="note"
                                class="order-note @error('note') is-invalid @enderror"></textarea>
                        </div>
                        @error('note')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="order-action">
                            <button class="order-btn" type="submit">Đặt hàng</button>
                        </div>
                    </form>
                    <div class="col l-2"></div>
                </div>
            </div>
        @else
            <p class="order-alert">
                Vui lòng đăng nhập để đặt hàng
                <a href="{{ route('user-login') }}">Đăng nhập</a>
            </p>
        @endif
    @else
        <div class="cart-no-cart-img">
            <img src="{{ asset('home/images/no_cart.webp') }}">
        </div>
    @endif
@endsection
