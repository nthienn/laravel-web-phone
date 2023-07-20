<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Images;
use App\Models\Comments;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('id_taikhoan', session()->get('id_taikhoan'))->join('tbl_danhmuc', 'tbl_danhmuc.id_danhmuc', '=', 'tbl_sanpham.id_danhmuc')->orderBy('id_sanpham', 'DESC')->get();
        return view('seller.product.index')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('id_danhmuc', 'ASC')->get();
        return view('seller.product.create')->with(compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'tensanpham' => 'required|max:255',
                'hinhanh' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
                'images' => 'required',
                'giasanpham' => 'required|max:255',
                'soluong' => 'required|max:255',
                'danhmuc' => 'required',
                'diadiem' => 'required|max:255',
                'noidung' => 'required|max:255'
            ],
            [
                'tensanpham.required' => 'Tên sản phẩm không được để trống',
                'hinhanh.required' => 'Hình ảnh không được để trống',
                'images.required' => 'Hình ảnh chi tiết không được để trống',
                'giasanpham.required' => 'Giá sản phẩm không được để trống',
                'soluong.required' => 'Số lượng không được để trống',
                'diadiem.required' => 'Địa điểm không được để trống',
                'noidung.required' => 'Nội dung không được để trống'
            ]
        );

        $product = new Product();
        $product->tensanpham = $validated['tensanpham'];

        $get_image = $request->hinhanh;
        $name_image = time() . '.' . $get_image->getClientOriginalExtension();
        $get_image->move(public_path('uploads/products'), $name_image);
        $product->hinhanh = $name_image;

        $product->giasanpham = $validated['giasanpham'];
        $product->soluong = $validated['soluong'];
        $product->diadiem = $validated['diadiem'];
        $product->noidung = $validated['noidung'];
        $product->id_danhmuc = $validated['danhmuc'];
        $product->id_taikhoan = session()->get('id_taikhoan');

        $product->save();

        $files = $request->images;
        foreach ($files as $file) {
            $name_image = $file->getClientOriginalName();
            $file->move(public_path('uploads/products'), $name_image);

            $images = new Images();
            $images->id_sanpham = $product->id_sanpham;
            $images->hinhanh = $name_image;
            $images->save();
        }

        return redirect()->back()->with('status', 'Đăng tin sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $images = Images::where('id_sanpham', $id)->get();
        $categories = Category::orderBy('id_danhmuc', 'ASC')->get();
        return view('seller.product.edit')->with(compact('product', 'images', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'tensanpham' => 'required|max:255',
                'giasanpham' => 'required|max:255',
                'soluong' => 'required|max:255',
                'diadiem' => 'required|max:255',
                'noidung' => 'required|max:255'
            ],
            [
                'tensanpham.required' => 'Tên sản phẩm không được để trống',
                'giasanpham.required' => 'Giá sản phẩm không được để trống',
                'soluong.required' => 'Số lượng không được để trống',
                'diadiem.required' => 'Địa điểm không được để trống',
                'noidung.required' => 'Nội dung không được để trống'
            ]
        );

        $product = Product::find($id);
        $product->tensanpham = $validated['tensanpham'];

        $get_image = $request->hinhanh;
        if ($get_image) {
            $path = public_path('uploads/products/' . $product->hinhanh);
            if (file_exists($path)) {
                unlink($path);
            }
            $name_image = time() . '.' . $get_image->getClientOriginalExtension();
            $get_image->move(public_path('uploads/products'), $name_image);
            $product->hinhanh = $name_image;
        }

        $product->giasanpham = $validated['giasanpham'];
        $product->soluong = $validated['soluong'];
        $product->diadiem = $validated['diadiem'];
        $product->noidung = $validated['noidung'];
        $product->id_danhmuc = $request->danhmuc;
        $product->id_taikhoan = session()->get('id_taikhoan');

        $product->save();

        $files = $request->images;
        if ($files) {
            $images = Images::where('id_sanpham', $id)->get();
            foreach ($images as $image) {
                $path = public_path('uploads/products/' . $image->hinhanh);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            Images::where('id_sanpham', $id)->delete();
            foreach ($files as $file) {
                $name_image = $file->getClientOriginalName();
                $file->move(public_path('uploads/products'), $name_image);

                $images = new Images();
                $images->id_sanpham = $product->id_sanpham;
                $images->hinhanh = $name_image;
                $images->save();
            }
        }

        return redirect()->back()->with('status', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $path = public_path('uploads/products/' . $product->hinhanh);
        if (file_exists($path)) {
            unlink($path);
        }

        $images = Images::where('id_sanpham', $id)->get();
        foreach ($images as $image) {
            $path = public_path('uploads/products/' . $image->hinhanh);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        Comments::where('id_sanpham', $id)->delete();
        Images::where('id_sanpham', $id)->delete();
        Product::find($id)->delete();
        return redirect()->back()->with('status', 'Xoá sản phẩm thành công');
    }
}
