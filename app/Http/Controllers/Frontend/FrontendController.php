<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
class FrontendController extends Controller
{
    public function index(){
        $featured_products = Product::where('trending' , '1')->take(15)->get();
        return view('frontend.index' , compact('featured_products'));
    }
}
