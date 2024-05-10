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

class DashboardController extends Controller
{
    public function users(){
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function viewUser($id){
        
        $users = User::find($id);
        return view('admin.users.view', compact('users'));
    }
}
