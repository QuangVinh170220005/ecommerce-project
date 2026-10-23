<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function showOrder(){
        $orders = Order::all();
        return view('admin.user.order.list', compact('orders'));
    }
}
