<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Images;
use App\Models\Comments;

class HomeController extends Controller
{
    public function home()
    {
        $categories = Category::orderBy('id_danhmuc', 'ASC')->get();
        $products = Product::orderBy('id_sanpham', 'DESC')->paginate(20);
        return view('home')->with(compact('categories', 'products'));
    }

    public function category($name_category,$id_category)
    {
        $categories = Category::orderBy('id_danhmuc', 'ASC')->get();
        $category = Category::where('tendanhmuc', $name_category)->first();
        $products = Product::orderBy('id_sanpham', 'DESC')->where('id_danhmuc',$id_category)->paginate(20);
        return view('pages.category')->with(compact('categories', 'category', 'products'));
    }

    public function productDetail($id_product)
    {
        $categories = Category::orderBy('id_danhmuc', 'ASC')->get();
        $product = Product::where('id_sanpham',$id_product)->join('tbl_taikhoan', 'tbl_taikhoan.id_taikhoan', '=', 'tbl_sanpham.id_taikhoan')->get();
        $images = Images::where('id_sanpham',$id_product)->get();
        $comments = Comments::where('id_sanpham',$id_product)->join('tbl_taikhoan', 'tbl_taikhoan.id_taikhoan', '=', 'tbl_danhgia.id_taikhoan')->get();
        return view('pages.product-detail')->with(compact('categories', 'product', 'images', 'comments'));
    }

    public function search()
    {
        $categories = Category::orderBy('id_danhmuc', 'ASC')->get();
        $tukhoa = $_GET['tukhoa'];
        $products = Product::orderBy('id_sanpham', 'DESC')->where('tensanpham','LIKE','%'.$tukhoa.'%')->paginate(50);
        return view('pages.search')->with(compact('categories', 'products', 'tukhoa'));
    }
}
