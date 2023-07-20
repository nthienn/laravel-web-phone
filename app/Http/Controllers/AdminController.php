<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    public function home(Request $request)
    {
        if ($request->session()->has('id_admin')) {
            return view('admin.home');
        } else {
            return view('admin.login');
        }
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $result = Admin::where('email', $email)->where('password', md5($password))->first();

        if ($result) {
            $request->session()->put('id_admin', $result->id_admin);
            $request->session()->put('name', $result->name);
            return redirect('/admin');
        } else {
            return redirect()->back()->with('status', 'Email hoặc mật khẩu không chính xác');
        }
    }

    public function logout(Request $request) {
        $request->session()->forget('id_admin');
        $request->session()->forget('name');
        return redirect('/admin');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = Admin::orderBy('id_admin', 'DESC')->get();
        return view('admin.profile.index')->with(compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = Admin::find($id);
        return view('admin.profile.edit')->with(compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'name' => 'required|max:255',
                'phone' => 'required|max:10',
                'email' => 'required|email:rfc,dns|max:255',
                'address' => 'required|max:255'
            ],
            [
                'name.required' => 'Tên không được để trống',
                'phone.required' => 'Số điện thoại không được để trống',
                'phone.max' => 'Số điện thoại không quá 10 số',
                'email.required' => 'Email không được để trống',
                'address.required' => 'Địa chỉ không được để trống'
            ]
        );

        $profile = Admin::find($id);
        $profile->name = $validated['name'];
        $profile->phone = $validated['phone'];
        $profile->email = $validated['email'];
        $profile->address = $validated['address'];
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
}
