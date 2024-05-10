@extends('layouts.inc.front')

@section('titel')
My Cart
@endsection

@section('content')
<!-- @include('layouts.inc.frontendslider') -->
<div class="py-3 mb-4 shodow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/')}}">Home</a> /
            <a href="{{ url('cart')}}">Shopping Cart</a>
        </h6>
    </div>
</div>
<div class="container">
    <div class="card shodow ">
        @if ($cartItems->count() > 0)
        <div class="card-body">
            <h2>Shopping Cart</h2>
            <hr>
            @php
            $total = 0;
            @endphp
            @foreach ($cartItems as $item)
            <div class="row product_data">
                <div class="col-md-2 border-right my-auto">
                    <img src="{{ asset('assets/uploads/product/' . $item->products->image) }}" height="70px" width="70px" alt="{{ $item->products->name }}">
                </div>
                <div class="col-md-3 my-auto">
                    <h6>
                        {{ $item->products->name}}
                    </h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>
                        Rs {{ $item->products->selling_price }}
                    </h6>
                </div>
                <div class="col-md-3 my-auto">
                    <input type="hidden" class="product_id" value="{{ $item->product_id}}">
                    @if ($item->products->qty >= $item->product_qty)
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width: 130px;">
                        <span class="input-group-text changeQuantity decrement-btn">-</span>
                        <input type="text" name="quantity" class="form-control text-center qty-input" value="{{ $item->product_qty}}" />
                        <span class="input-group-text changeQuantity increment-btn">+</span>
                    </div>
                    @php
                    $total += $item->products->selling_price * $item->product_qty;
                    @endphp
                    @else
                    <span class="badge bg-danger text-white border border-danger rounded">Out of Stock</span>
                    @endif

                </div>
                <div class="col-md-2 my-auto">
                    <button type="button" class="btn btn-danger mb-2 delete-cart-item">
                        <i class="fa fa-trash"></i> Remove
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        <div class="card-footer">
            <h6>Total Price : {{ $total }}</h6>
            <a class="btn btn-outline-success float-end" href="{{ url('checkout')}}">Proceed To Checkout</a>
        </div>
        @else
        <div class="card-body text-center">
        <img src="{{ asset('assets/images/empty-cart.webp')}}"  style="width: 500px;" height="300px" alt="...">
            <h2>Your <i class="fa fa-shopping-cart"></i>Cart is Empty</h2>
            <p>There is nothing in your cart. Let's add some items</p>
            <a href="{{ url('category')}}" class="btn btn-outline-primary float-end">Contiune Shopping</a>
        </div>

        @endif
    </div>
</div>
@endsection