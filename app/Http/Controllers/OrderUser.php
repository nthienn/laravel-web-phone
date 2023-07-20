<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;

class OrderUser extends Controller
{
    public function orderHistory()
    {
        $orders = Order::where('id_taikhoan', session()->get('id_taikhoan'))->orderBy('id_order', 'DESC')->get();
        return view('pages.order-history')->with(compact('orders'));
    }

    public function orderDetail($id_order)
    {
        $order_detail = OrderDetail::where('id_order', $id_order)->join('tbl_sanpham', 'tbl_sanpham.id_sanpham', '=', 'tbl_order_detail.id_sanpham')->join('tbl_taikhoan', 'tbl_taikhoan.id_taikhoan', '=', 'tbl_sanpham.id_taikhoan')->get();
        return view('pages.order-detail')->with(compact('order_detail'));
    }
}
