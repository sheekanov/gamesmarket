<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', '=', 1)->orderBy('updated_at', 'desc')->get();
        return view('admin.orders', ['orders' => $orders]);
    }

    public function view($order_id)
    {
        $order = Order::find($order_id);
        return view('admin.orderView', ['order' => $order]);
    }
}
