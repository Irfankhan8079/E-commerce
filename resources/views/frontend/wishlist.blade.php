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
            <a href="{{ url('wishlist')}}">Shopping Wishlist</a>
        </h6>
    </div>
</div>
<div class="container">
    <div class="card shodow ">
        @if ($wishlists->count() > 0)
        <div class="card-body">
            <h2>Shopping Wishlist</h2>
            <hr>
            @foreach ($wishlists as $item)
            <div class="row product_data">
                <div class="col-md-2 border-right my-auto">
                    <img src="{{ asset('assets/uploads/product/' . $item->products->image) }}" height="70px" width="70px" alt="{{ $item->products->name }}">
                </div>
                <div class="col-md-2 my-auto">
                    <h6>
                        {{ $item->products->name}}
                    </h6>
                </div>
                <div class="col-md-2 my-auto">
                    <h6>
                        Rs {{ $item->products->selling_price }}
                    </h6>
                </div>
                <div class="col-md-2 my-auto">
                    <input type="hidden" class="product_id" value="{{ $item->product_id}}">
                    @if ($item->products->qty >= $item->product_qty)
                    <label for="Quantity">Quantity</label>
                    <div class="input-group text-center mb-3" style="width: 130px;">
                        <span class="input-group-text  decrement-btn">-</span>
                        <input type="text" name="quantity" class="form-control text-center qty-input" value="1" />
                        <span class="input-group-text  increment-btn">+</span>
                    </div>
                    @else
                    <h6 class="badge bg-danger text-white border border-danger rounded">Out of Stock</h6>
                    @endif

                </div>
                <div class="col-md-2 my-auto">
                    <button type="button" class="btn btn-primary me-3 floart-start addToCartBtn">Add to Cart <i class="fa fa-shopping-cart"></i></button>                   
                </div>
                <div class="col-md-2 my-auto">
                    <button type="button" class="btn btn-danger mb-2 delete-wishlist-item">
                        <i class="fa fa-trash"></i> Remove
                    </button>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="card-body text-center">
            
        <a href="{{ url('category')}}" class="btn btn-outline-primary float-end">Contiune Shopping</a>
            <img src="{{ asset('assets/images/wishlist.jpg')}}" style="width: 500px;" height="400px" alt="...">
            <h2>Your <i class="fa fa-heart " style="color: red;"></i> Wishlist is Empty</h2>
            <p>There is nothing in your wishlist. Let's add some items</p>
        </div>

        @endif
    </div>
</div>
@endsection