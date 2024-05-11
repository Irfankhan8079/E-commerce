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
use App\Wishlist;
use App\Http\Controllers\Controller;

class WishlistController extends Controller
{
    public function index()
    {

        $wishlists = Wishlist::where('user_id', Auth::id())->get();
        return view('frontend.wishlist', compact('wishlists'));
    }

    // public function addWishlist(Request $request)
    // {

    //     if (Auth::check()) {
    //         $product_id = $request->input('product_id');
    //         if (Product::find($product_id)) {
    //             $wishlistItem = new Wishlist();
    //             $wishlistItem->product_id = $product_id;
    //             $wishlistItem->user_id = Auth::id();
    //             $wishlistItem->save();
    //             return response()->json(['status' =>  " Added to Wishlist"]);
    //         } else {
    //             return response()->json(['status' => "Products doesnot exist"]);
    //         }
    //     } else {
    //         return response()->json(['status' => "Login To Continue"]);
    //     }
    // }


    public function addWishlist(Request $request)
    {

        $product_id = $request->input('product_id');

        if (Auth::check()) {
            $product_check = Product::where('id', $product_id)->first();
            if ($product_check) {

                if (Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                    return response()->json(['status' => $product_check->name . " Already Added to Wishlist"]);
                } else {
                    $WishlistItem = new Wishlist();
                    $WishlistItem->product_id = $product_id;
                    $WishlistItem->user_id = Auth::id();
                    $WishlistItem->save();
                    return response()->json(['status' => $product_check->name . " Added to Wishlist"]);
                }
                
            }
        } else {
            return response()->json(['status' => "Login To Continue"]);
        }
    }

    public function deleteWishlist(Request $request)
    {
        if (Auth::check()) {
            $product_id = $request->input('product_id');
            if (Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {

                $wishlistItem = Wishlist::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $wishlistItem->delete();
                return response()->json(['status' => "Wishlist delete Successfully"]);
            }
        } else {
            return response()->json(['status' => "Login To Continue"]);
        }
       
    }

    public function wishlistCount(){

        $wishlistCount = Wishlist::where('user_id', Auth::id())->count();
        return response()->json(['count' => $wishlistCount]);
    }
}
