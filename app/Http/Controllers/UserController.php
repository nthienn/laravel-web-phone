<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comments;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('pages.login');
    }

    public function postLogin(Request $request)
    {
        $validated = $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ],
            [
                'email.required' => 'Email không được để trống',
                'password.required' => 'Password không được để trống'
            ]
        );

        $email = $validated['email'];
        $password = $validated['password'];

        $result = User::where('email', $email)->first();

        if ($result && Hash::check($password,$result->matkhau)) {
            $request->session()->put('id_taikhoan', $result->id_taikhoan);
            $request->session()->put('tenkhachhang', $result->tenkhachhang);
            return redirect('/');
        } else {
            return redirect()->back()->with('status', 'Email hoặc mật khẩu không chính xác');
        }
    }

    public function logout(Request $request) {
        $request->session()->forget('id_taikhoan');
        $request->session()->forget('tenkhachhang');
        return redirect('/');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('id_taikhoan',session()->get('id_taikhoan'))->get();
        return view('pages.profile')->with(compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|max:255',
                'dienthoai' => 'required|unique:tbl_taikhoan|max:10',
                'email' => 'required|unique:tbl_taikhoan|max:100',
                'address' => 'required|max:255',
                'password' => 'required|max:100',
                'password_confirmation' => 'required|max:255|same:password'
            ],
            [
                'name.required' => 'Tên không được để trống',
                'dienthoai.required' => 'Số điện thoại không được để trống',
                'dienthoai.unique' => 'Số điện thoại đã được đăng ký',
                'dienthoai.max' => 'Số điện thoại không quá 10 số',
                'email.required' => 'Email không được để trống',
                'email.unique' => 'Email đã được đăng ký',
                'address.required' => 'Địa chỉ không được để trống',
                'password.required' => 'Mật khẩu không được để trống',
                'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu',
                'password_confirmation.same' => 'Mật khẩu nhập lại không chính xác'
            ]
        );

        $user = new User();
        $user->tenkhachhang = $validated['name'];
        $user->dienthoai = $validated['dienthoai'];
        $user->email = $validated['email'];
        $user->diachi = $validated['address'];
        $user->matkhau = Hash::make($validated['password']);

        $user->save();
        return redirect()->back()->with('status', 'Đăng ký thành công');
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
        $profile = User::find($id);
        return view('pages.edit-profile')->with(compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'name' => 'required|max:255',
                'dienthoai' => 'required|max:10',
                'email' => 'required|max:100',
                'address' => 'required|max:255'
            ],
            [
                'name.required' => 'Tên không được để trống',
                'dienthoai.required' => 'Số điện thoại không được để trống',
                'dienthoai.max' => 'Số điện thoại không quá 10 số',
                'email.required' => 'Email không được để trống',
                'address.required' => 'Địa chỉ không được để trống'
            ]
        );

        $profile = User::find($id);
        $profile->tenkhachhang = $validated['name'];
        $profile->dienthoai = $validated['dienthoai'];
        $profile->email = $validated['email'];
        $profile->diachi = $validated['address'];
        $profile->save();
        return redirect()->back()->with('status', 'Cập nhật thông tin thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function changePass()
    {
        return view('pages.change-pass');
    }

    public function updatePass(Request $request)
    {
        $validated = $request->validate(
            [
                'password' => 'required',
                'password_new' => 'required|max:100',
                'password_confirmation' => 'required|same:password_new'
            ],
            [
                'password.required' => 'Mật khẩu không được để trống',
                'password_new.required' => 'Vui lòng nhập mật khẩu mới',
                'password_confirmation.required' => 'Vui lòng nhập lại mật khẩu',
                'password_confirmation.same' => 'Mật khẩu nhập lại không chính xác'
            ]
        );

        $password = $validated['password'];
        $password_new = $validated['password_new'];

        $profile = User::where('id_taikhoan',session()->get('id_taikhoan'))->first();
        if (Hash::check($password,$profile->matkhau)) {
            $profile->matkhau = Hash::make($password_new);
            $profile->save();
            return redirect()->back()->with('status', 'Đổi mật khẩu thành công');
        } else {
            return redirect()->back()->with('danger', 'Mật khẩu không chính xác');
        }
    }

    public function comment(Request $request, $id_product)
    {
        $validated = $request->validate(
            [
                'comment' => 'required|max:255'
            ],
            [
                'comment.required' => 'Vui lòng nhập bình luận'
            ]
        );

        $comment = new Comments();
        $comment->id_taikhoan = session()->get('id_taikhoan');
        $comment->id_sanpham = $id_product;
        $comment->noidung = $validated['comment'];
        $comment->ngaydg = date('Y-m-d');
        $comment->save();
        return redirect()->back()->with('status', 'Đánh giá thành công');
    }

    public function deleteComment($id_comment)
    {
        Comments::where('id_danhgia', $id_comment)->delete();
        return redirect()->back()->with('status', 'Xoá bình luận thành công');
    }
}