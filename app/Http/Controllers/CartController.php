<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;

class CartController extends Controller
{
    public function cart()
    {
        $categories = Category::orderBy('id_danhmuc', 'ASC')->get();
        $user = User::where('id_taikhoan',session()->get('id_taikhoan'))->get();
        return view('pages.cart')->with(compact('categories', 'user', ));
    }

    public function saveCart($id_product)
    {
        $data = Product::find($id_product);
        $cart = session()->get('cart', []);

        if (isset($cart[$id_product])) {
            if ($cart[$id_product]['quantity'] >= $data->soluong) {
                $cart[$id_product]['quantity'] = $data->soluong;
            } else {
                $cart[$id_product]['quantity']++;
            }
        } else {
            $cart[$id_product] = [
                'id_sanpham' => $data->id_sanpham,
                'tensanpham' => $data->tensanpham,
                'hinhanh' => $data->hinhanh,
                'giasanpham' => $data->giasanpham,
                'quantity' => 1
            ];
        }
        session()->put('cart', $cart);
        return redirect('/cart');
    }

    public function remove($id_product)
    {
        $cart = session()->get('cart');
        if (isset($cart[$id_product])) {
            unset($cart[$id_product]);
            session()->put('cart', $cart);
        }
        session()->flash('status', 'Xoá sản phẩm khỏi giỏ hàng thành công');
        return redirect()->back();
    }

    public function removeAll()
    {
        $cart = session()->get('cart');
        if (isset($cart)) {
            session()->forget('cart');
        }
        return redirect()->back();
    }

    public function order(Request $request)
    {
        $validated = $request->validate(
            [
                'name' => 'required|max:255',
                'phone' => 'required|max:10',
                'email' => 'required|max:100',
                'address' => 'required|max:255',
                'note' => 'required|max:255',
            ],
            [
                'name.required' => 'Tên không được để trống',
                'phone.required' => 'Số điện thoại không được để trống',
                'phone.max' => 'Số điện thoại không quá 10 số',
                'email.required' => 'Email không được để trống',
                'address.required' => 'Địa chỉ không được để trống',
                'note.required' => 'Ghi chú không được để trống',
            ]
        );

        $cart = session()->get('cart');
        foreach ($cart as $value) {
            $product = Product::where('id_sanpham',$value['id_sanpham'])->first();
            $price = $value['giasanpham'] * $value['quantity'];

            $order = new Order();
            $order->id_taikhoan = session()->get('id_taikhoan');
            $order->id_seller = $product->id_taikhoan;
            $order->code_order = rand(0,9999);
            $order->total = $price;
            $order->note = $validated['note'];
            $order->status = 0;
            $order->save();

            $order_detail = new OrderDetail();
            $order_detail->id_order = $order->id_order;
            $order_detail->id_sanpham = $value['id_sanpham'];
            $order_detail->price = $value['giasanpham'];
            $order_detail->quantity = $value['quantity'];
            $order_detail->save();

            $product->soluong = $product->soluong - $value['quantity'];
            $product->save();
        }
        session()->forget('cart');
        return redirect()->back()->with('success', 'Đặt hàng thành công');
    }
}
