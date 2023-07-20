@extends('layouts.master')

@section('title')
    <title>Website Mua Bán Điện Thoại Cũ</title>
@endsection

@section('content')
    @include('components.sidebar')

    <!-- Product details -->
    @foreach ($product as $key => $value)
        <div class="product-detail">
            <div class="row">
                <div class="col l-5">
                    <div class="product-detail-image">
                        <span class="control prev">
                            <i class="fa-solid fa-chevron-left"></i>
                        </span>
                        <span class="control next">
                            <i class="fa-solid fa-chevron-right"></i>
                        </span>
                        <img src="" class="product-detail__img">
                    </div>
                    <div class="list-img">
                        <div>
                            <img src="{{ asset('uploads/products/' . $value->hinhanh) }}">
                        </div>
                        @foreach ($images as $key => $image)
                            <div>
                                <img src="{{ asset('uploads/products/' . $image->hinhanh) }}">
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col l-7 product-detail-desc">
                    <div class="product-detail-info">
                        <h3 class="product-detail__name">{{ $value->tensanpham }}</h3>
                        <div class="product-detail__price">
                            <span>{{ number_format($value->giasanpham) . ' đ' }}</span>
                        </div>
                        <div class="product-detail__origin">
                            <i class="fa-solid fa-location-dot product-detail__icon"></i>
                            <span>{{ $value->diadiem }}</span>
                        </div>
                    </div>

                    <div class="product-detail-content">
                        <h3>Mô tả sản phẩm</h3>
                        <p>{{ $value->noidung }}</p>
                    </div>

                    <div class="product-detail-action">
                        @if ($value->soluong > 0)
                            <a href="{{ route('save-cart', $value->id_sanpham) }}" class="product-detail-add"
                                role="button">
                                <i class="fa-solid fa-cart-plus"></i>
                                <span>Thêm Vào Giỏ Hàng</span>
                            </a>
                            <div class="product-detail__quantity">
                                <strong>{{ $value->soluong }}</strong>
                                <span>sản phẩm có sẵn</span>
                            </div>
                        @else
                            <div class="product-detail__quantity">
                                <span>Sản phẩm đã được bán</span>
                            </div>
                        @endif
                    </div>

                    <div class="information-seller">
                        <h4>Liên hệ với người bán</h4>
                        <div class="information-seller-name">
                            <img src="{{ asset('home/images/avatar.png') }}" alt="">
                            <p>
                                <span>{{ $value->tenkhachhang }}</span>
                                <!-- <a href="#">Xem trang cá nhân</a> -->
                            </p>
                        </div>
                        <div class="information-seller-phone">
                            <button class="information-seller-call">
                                <i class="fa-solid fa-phone"></i>
                                <span>{{ $value->dienthoai }}</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="comments">
                <h2>Đánh giá</h2>
                <ul>
                    @foreach ($comments as $key => $comment)
                        <li class="comment">
                            <div class="comment-user">
                                <img src="{{ asset('home/images/avatar.png') }}" alt="">
                                <p>
                                    <strong>{{ $comment->tenkhachhang }}</strong>
                                    <span>{{ $comment->ngaydg }}</span>
                                </p>
                            </div>
                            <div class="comment-text">
                                <p>{{ $comment->noidung }}</p>
                                @if ($comment->id_taikhoan == session()->get('id_taikhoan'))
                                    <a href="{{ route('delete-comment', $comment->id_danhgia) }}"
                                        onclick="return confirm('Xoá bình luận?')">Xóa</a>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session()->has('id_taikhoan'))
                    <form method="POST" action="{{ route('comment', $value->id_sanpham) }}" class="comment-send">
                        @csrf
                        <input type="text" placeholder="Để lại bình luận của bạn" name="comment">
                        <button type="submit" name="send">Gửi đánh giá</button>
                    </form>
                @else
                    <p class="comment-alert">
                        Vui lòng đăng nhập để gửi đánh giá
                        <a href="{{ route('user-login') }}">Đăng nhập</a>
                    </p>
                @endif
            </div>
        </div>
    @endforeach

    <script src="{{ asset('home/js/images.js') }}"></script>
@endsection
