@extends('layouts.master')

@section('title')
    <title>Website Mua Bán Điện Thoại Cũ</title>
@endsection

@section('content')
    <div class="product-management">
        <h3>Đăng Tin Sản Phẩm</h3>
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <table width="100%" style="border-collapse: collapse;">
            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
                <tr>
                    <td>Tên sản phẩm</td>
                    <td>
                        @error('tensanpham')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" name="tensanpham" class="@error('tensanpham') is-invalid @enderror"
                            value="{{ old('tensanpham') }}">                       
                    </td>
                </tr>
                <tr>
                    <td>Hình ảnh</td>
                    <td>
                        @error('hinhanh')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="file" name="hinhanh" class="@error('hinhanh') is-invalid @enderror"
                            value="{{ old('hinhanh') }}">
                    </td>
                </tr>
                <tr>
                    <td>Hình ảnh chi tiết (Tối đa 3 hình ảnh)</td>
                    <td>
                        @error('images')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="file" name="images[]" multiple="multiple"
                            class="@error('images') is-invalid @enderror" value="{{ old('images') }}">                        
                    </td>
                </tr>
                <tr>
                    <td>Giá sản phẩm</td>
                    <td>
                        @error('giasanpham')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="number" min="1" name="giasanpham" class="@error('giasanpham') is-invalid @enderror"
                            value="{{ old('giasanpham') }}">
                    </td>
                </tr>
                <tr>
                    <td>Số lượng</td>
                    <td>
                        @error('soluong')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="number" min="1" name="soluong" class="@error('soluong') is-invalid @enderror"
                            value="{{ old('soluong') }}">
                    </td>
                </tr>
                <tr>
                    <td>Danh mục sản phẩm</td>
                    <td>
                        <select name="danhmuc">
                            @foreach ($categories as $item)
                                <option value="{{ $item->id_danhmuc }}">{{ $item->tendanhmuc }}</option>
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
                            value="{{ old('diadiem') }}">
                    </td>
                </tr>
                <tr>
                    <td>Nội dung</td>
                    <td>
                        @error('noidung')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <textarea rows="10" cols="30" name="noidung" class="@error('noidung') is-invalid @enderror"
                            value="{{ old('noidung') }}"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit">Đăng tin Sản Phẩm</button></td>
                </tr>
            </form>
        </table>
    </div>
@endsection
