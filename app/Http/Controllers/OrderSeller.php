<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderSeller extends Controller
{
    public function orderSeller()
    {
        $orders = Order::where('id_seller', session()->get('id_taikhoan'))->join('tbl_taikhoan', 'tbl_taikhoan.id_taikhoan', '=', 'tbl_order.id_taikhoan')->orderBy('id_order', 'DESC')->get();
        return view('seller.order.index')->with(compact('orders'));
    }

    public function orderDetailSeller($id_order)
    {
        $order_detail = OrderDetail::where('id_order', $id_order)->join('tbl_sanpham', 'tbl_sanpham.id_sanpham', '=', 'tbl_order_detail.id_sanpham')->get();
        $order = Order::where('id_order', $id_order)->first();
        return view('seller.order.detail')->with(compact('order_detail', 'order'));
    }

    public function updateOrder(Request $request, $id_order)
    {
        $order = Order::where('id_order', $id_order)->first();
        $order->status = $request->status;
        $order->save();
        return redirect()->back()->with('status', 'Cập nhật đơn hàng thành công');
    }
}
