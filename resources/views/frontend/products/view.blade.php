@extends('layouts.inc.front')

@section('titel')
{{ $products->name }}
@endsection

@section('content')
<!-- @include('layouts.inc.frontendslider') -->
<div class="py-3 mb-4 shodow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('category')}}">Collections</a> /
            <a href="{{ url('category/'.$products->category->slug)}}">{{ $products->category->name }}</a> /
            <a href="{{ url('category/'.$products->category->slug. '/' .$products->slug )}}"> {{ $products->name }}</a>

        </h6>
    </div>
</div>
<div class="container">
    <div class="card shodow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ asset('assets/uploads/product/' . $products->image) }}" alt="{{ $products->name }}" class="card-img-top img-fluid">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{ $products->name }}
                        @if ($products->trending == '1')
                        <label style="font-size: 16px;" class="float-end badge bg-danger trending-tag" for="">Trending</label>
                        @endif
                    </h2>
                    <hr>
                    <label class="me-3" for="">Original Price: <s>Rs {{ $products->original_price }}</s></label>
                    <label class="me-3" for=""><b>Selling Price: Rs {{ $products->selling_price }}</b></label>
                    <p class="mt-3">
                        {!! $products->small_description !!}
                    </p>
                    <hr>
                    @if ($products->qty > 0)
                    <label class="badge bg-success text-white border border-dark border-2" for="">In Stock</label>
                    @else
                    <label class="budge bg-danger text-white border border-dark border-2" for="">Out of Stock</label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2">
                            <input type="hidden" class="product_id" value="{{ $products->id }}">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3" style="width: 130px;">
                                <span class="input-group-text decrement-btn">-</span>
                                <input type="text" name="product_qty" value="1" class="form-control text-center qty-input" />
                                <span class="input-group-text increment-btn">+</span>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br>
                            @if ($products->qty > 0)
                            <button type="button" class="btn btn-primary me-3 floart-start addToCartBtn">Add to Cart <i class="fa fa-shopping-cart"></i></button>
                            @endif
                            <button type="button" class="btn btn-success me-3 floart-start addToWishlistBtn">Add to Wishlist <i class="fa fa-heart"></i></button>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <h3>Description</h3>
                    <div class="card p-3">
                        <p class="card-text">{{ $products->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection