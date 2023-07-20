@extends('layouts.master')

@section('title')
    <title>Website Mua Bán Điện Thoại Cũ</title>
@endsection

@section('content')
    @include('components.sidebar')

    <!-- Product -->
    <div class="home-product">
        <h3>Từ khóa tìm kiếm: {{ $tukhoa }}</h3>
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
@endsection
