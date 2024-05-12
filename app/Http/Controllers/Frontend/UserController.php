<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\Category;
use App\Cart;
use App\Order;
use App\OrderItem;
use App\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index(){

        $orders = Order::where('user_id', Auth::id())->get();
        return view('frontend.orders.index', compact('orders'));
    }

    public function viewOrder($id){

        $orders = Order::where('id', $id)->where('user_id', Auth::id())->first();
        if (!$orders) {
            // Redirect to the home page with a flash message
            return redirect('/')->with('error', 'Order not found.');
        }
        return view('frontend.orders.view', compact('orders'));
    }
}
