<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products = Product::where('trending', '1')->take(15)->get();
        $featured_category = Category::where('popular', '1')->take(15)->get();
        return view('frontend.index', compact('featured_products', 'featured_category'));
    }

    public function category()
    {
        $categorys = Category::where('status', '0')->get();
        return view('frontend.category', compact('categorys'));
    }


    public function viewcategory($slug)
    {

        if (Category::where('slug', $slug)->exists()) {

            $categorys = Category::where('slug', $slug)->first();
            $products = Product::where('cate_id', $categorys->id)->where('status', '0')->get();
            return view('frontend.products.index', compact('categorys', 'products'));
        } else {
            return view('/')->with('status', 'Slug dosenot exists');
        }
    }

    public function viewproduct($cate_slug, $product_slug)
    {

        if (Product::where('slug', $product_slug)->exists()) {

            if (Category::where('slug', $cate_slug)->exists()) {

                $products = Product::where('slug', $product_slug)->first();
                return view('frontend.products.view', compact('products'));
            } else {
                return view('/')->with('status', 'The Link was broken');
            }
        } else {
            return view('/')->with('status', 'NO such Category found');
        }
    }
}
