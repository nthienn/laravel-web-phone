@extends('layouts.master')

@section('title')
    <title>Website Mua Bán Điện Thoại Cũ</title>
@endsection

@section('content')
    @include('components.sidebar')

    <div class="banner">
        <div class="banner-image">
            <span class="banner-control banner-prev">
                <i class="fa-solid fa-chevron-left"></i>
            </span>
            <span class="banner-control banner-next">
                <i class="fa-solid fa-chevron-right"></i>
            </span>
            <img src="{{ asset('home/images/banner1.jpg') }}" class="banner__img">
        </div>
        <div class="banner-list-img">
            <div>
                <img src="{{ asset('home/images/banner1.jpg') }}">
            </div>
            <div>
                <img src="{{ asset('home/images/banner2.jpg') }}">
            </div>
            <div>
                <img src="{{ asset('home/images/banner3.jpg') }}">
            </div>
            <div>
                <img src="{{ asset('home/images/banner4.jpg') }}">
            </div>
        </div>
    </div>

    <!-- Product -->
    <div class="home-product">
        <div class="row">
            @foreach ($products as $key => $product)
                <div class="col l-2-4">
                    <a href="{{ route('product-detail', ['id' => $product->id_sanpham]) }}" class="home-product-item">
                        <img src="{{ asset('uploads/products/' . $product->hinhanh) }}" class="home-product-item__img">
                        <div class="home-product-info">
                            <h4 class="home-product-item__name">{{ $product->tensanpham }}</h4>
                            <div class="home-product-item__price">
                                <span>{{ number_format($product->giasanpham) . ' đ' }}</span>
                            </div>
                            <div class="home-product-item__origin">
                                <span>{{ $product->diadiem }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    {{ $products->links('pages.pagination') }}

    <script src="{{ asset('home/js/banner.js') }}"></script>
@endsection
