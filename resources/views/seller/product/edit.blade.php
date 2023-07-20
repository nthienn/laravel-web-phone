@extends('layouts.master')

@section('title')
    <title>Website Mua Bán Điện Thoại Cũ</title>
@endsection

@section('content')
    <div class="product-management">
        <h3>Cập nhật Sản Phẩm</h3>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table width="100%" style="border-collapse: collapse;">
            <form method="POST" action="{{ route('product.update', [$product->id_sanpham]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <tr>
                    <td>Tên sản phẩm</td>
                    <td>
                        @error('tensanpham')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" name="tensanpham" class="@error('tensanpham') is-invalid @enderror"
                            value="{{ $product->tensanpham }}">
                    </td>
                </tr>
                <tr>
                    <td>Hình ảnh</td>
                    <td>
                        @error('hinhanh')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="file" name="hinhanh" class="@error('hinhanh') is-invalid @enderror">
                        <img src="{{ asset('uploads/products/' . $product->hinhanh) }}" width="100px">
                    </td>
                </tr>
                <tr>
                    <td>Hình ảnh chi tiết (Tối đa 3 hình ảnh)</td>
                    <td>
                        @error('images')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="file" name="images[]" multiple="multiple"
                            class="@error('images') is-invalid @enderror">
                        @foreach ($images as $key => $image)
                            <img src="{{ asset('uploads/products/' . $image->hinhanh) }}" width="100px">
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Giá sản phẩm</td>
                    <td>
                        @error('giasanpham')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="number" min="1" name="giasanpham"
                            class="@error('giasanpham') is-invalid @enderror" value="{{ $product->giasanpham }}">
                    </td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td>
                        @error('soluong')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="number" min="1" name="soluong" class="@error('soluong') is-invalid @enderror"
                            value="{{ $product->soluong }}">
                    </td>
                </tr>
                <tr>
                    <td>Danh mục sản phẩm</td>
                    <td>
                        <select name="danhmuc">
                            @foreach ($categories as $item)
                                <option {{ $item->id_danhmuc == $product->id_danhmuc ? 'selected' : '' }}
                                    value="{{ $item->id_danhmuc }}">{{ $item->tendanhmuc }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Địa điểm</td>
                    <td>
                        @error('diadiem')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" name="diadiem" class="@error('diadiem') is-invalid @enderror"
                            value="{{ $product->diadiem }}">
                    </td>
                </tr>
                <tr>
                    <td>Nội dung</td>
                    <td>
                        @error('noidung')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <textarea rows="10" cols="30" name="noidung" class="@error('noidung') is-invalid @enderror">{{ $product->noidung }}</textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit">Cập nhật Sản Phẩm</button></td>
                </tr>
            </form>
        </table>
    </div>
@endsection
