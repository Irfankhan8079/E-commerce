@extends('layouts.inc.front')

@section('titel')
welcome to E-Shop
@endsection

@section('content')
@include('layouts.inc.frontendslider')
<div class="py-5">
    <div class="container">
        <div class="row">
            @foreach ($featured_products as $product)
            <div class="col-md-3 mg-3">
                <div class="card">
                    <img src="{{ asset('assets/uploads/product/' . $product->image) }}" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5>{{ $product->name }}</h5>
                        <p>{{ $product->small_description }}</p>
                        <small>{{ $product->selling_price }}</small>
                        <!-- Add other product details as needed -->
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection