<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id_danhmuc', 'DESC')->get();
        return view('admin.category.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'tendanhmuc' => 'required|unique:tbl_danhmuc|max:255',
                'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
            ],
            [
                'tendanhmuc.required' => 'Tên danh mục không được để trống',
                'tendanhmuc.unique' => 'Tên danh mục đã tồn tại',
                'image.required' => 'Hình ảnh không được để trống'
            ]
        );

        $category = new Category();
        $category->tendanhmuc = $validated['tendanhmuc'];

        $get_image = $request->image;
        $name_image = time().'.'.$get_image->getClientOriginalExtension();
        $get_image->move(public_path('uploads/categories'),$name_image);       
        $category->image = $name_image;

        $category->save();
        return redirect()->back()->with('status', 'Thêm danh mục thành công');
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
        $category = Category::find($id);
        return view('admin.category.edit')->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'tendanhmuc' => 'required|max:255',
            ],
            [
                'tendanhmuc.required' => 'Tên danh mục không được để trống',
            ]
        );

        $category = Category::find($id);
        $category->tendanhmuc = $validated['tendanhmuc'];

        $get_image = $request->image;
        if ($get_image) {
            $path = public_path('uploads/categories/'.$category->image);
            if (file_exists($path)) {
                unlink($path);
            }
            $name_image = time().'.'.$get_image->getClientOriginalExtension();
            $get_image->move(public_path('uploads/categories'),$name_image);       
            $category->image = $name_image;
        }

        $category->save();
        return redirect()->back()->with('status', 'Cập nhật danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $path = public_path('uploads/categories/'.$category->image);
        if (file_exists($path)) {
            unlink($path);
        }
        Category::find($id)->delete();
        return redirect()->back()->with('status', 'Xoá danh mục thành công');
    }
}
