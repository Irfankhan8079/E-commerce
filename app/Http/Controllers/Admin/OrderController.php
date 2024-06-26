<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;
use App\Cart;
use App\Order;
use App\OrderItem;
use App\User;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index(){

        $orders = Order::where('status', '0')->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function viewOrder($id){

        $orders = Order::where('id', $id)->first();
        return view('admin.orders.view', compact('orders'));
    }

    public function updateOrder(Request $request, $id){

        $orders = Order::find($id);
        $orders->status = $request->input('order_status');
        $orders->update();
        return redirect('orders')->with('status' , "Order Updated Successfully");
    }

    public function ordersHistory(){

        $orders = Order::where('status', '1')->get();
        return view('admin.orders.history', compact('orders'));
    }
}
