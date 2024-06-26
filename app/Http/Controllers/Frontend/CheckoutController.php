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

class CheckoutController extends Controller
{
    public function index()
    {
        $old_cartItem = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartItem  as $item) {
            if (!Product::where('id', $item->product_id)->where('qty', '>=', $item->product_qty)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('product_id', $item->product_id)->first();
                $removeItem->delete();
            }
        }
        $cartItem = Cart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cartItem'));
    }


    public function placeOrder(Request $request)
    {

        $order = new Order();
        $order->user_id = Auth::id();
        $order->fname = $request->input('fname');
        $order->lname = $request->input('lname');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address1 = $request->input('address1');
        $order->address2 = $request->input('address2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->country = $request->input('country');
        $order->pincode = $request->input('pincode');

        $order->payment_mode = $request->input('payment_mode');
        $order->payment_id = $request->input('payment_id');

        $total = 0;
        $cartItems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems_total  as $product) {
            $total += $product->products->selling_price * $product->product_qty;
        }
        $order->total_price = $total;
        $order->tracking_no = 'irfan' . rand(1111, 9999);
        $order->save();

        // $order->id;
        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems  as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'product_qty' => $item->product_qty,
                'price' => $item->products->selling_price,
            ]);
            $product = Product::where('id', $item->product_id)->first();
            $product->qty = $product->qty - $item->product_qty;
            $product->update();
        }

        if (Auth::user()->address1 == null) {

            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('fname');
            $user->lname = $request->input('lname');
            $user->phone = $request->input('phone');
            $user->address1 = $request->input('address1');
            $user->address2 = $request->input('address2');
            $user->city = $request->input('city');
            $user->state = $request->input('state');
            $user->country = $request->input('country');
            $user->pincode = $request->input('pincode');
            $user->update();
        }

        // $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::where('user_id', Auth::id())->delete();
        // foreach ($cartItems as $cartItem) {
        //     $cartItem->delete();
        // }
        // Cart::destroy($cartItems);
        // dd($cartItems);
        // Cart::destroy($cartItems);
        if ($request->input('payment_mode') == "Paid By Razorpay") {
            return response()->json(['status'=> 'Order Placed Successfully']);
        }
        return redirect('/')->with('status', 'Order Placed Successfully');
    }


    public function razorpayCheck(Request $request)
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $total = 0;
        foreach ($cartItems as $item) {

            $total += $item->products->selling_price * $item->product_qty;
        }

        $firstname = $request->input('fname');
        $lastname = $request->input('lname');
        $email    = $request->input('email');
        $phone    = $request->input('phone');
        $address1 = $request->input('address1');
        $address2 = $request->input('address2');
        $city     = $request->input('city');
        $state    = $request->input('state');
        $country  = $request->input('country');
        $pincode =  $request->input('pincode');

        return response()->json([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'phone' => $phone,
            'address1' => $address1,
            'address2' => $address2,
            'city' => $city,
            'state' => $state,
            'country' => $country,
            'pincode' => $pincode,
            'total' => $total
        ]);
    }
}
