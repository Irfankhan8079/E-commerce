@extends('layouts.inc.front')

@section('titel')
{{ $categorys->name }}
@endsection

@section('content')
<!-- @include('layouts.inc.frontendslider') -->
<div class="py-5">
    <div class="py-3 mb-4 shodow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0"> <a href="{{ url('category')}}">Collections</a> / <a href="{{ url('category/'.$categorys->slug)}}">{{ $categorys->name }}</a></h6>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <h2>{{ $categorys->name }}</h2>
            @foreach ($products as $product)
            <div class="col-md-3 mg-3">
                <div class="card custom-card" style="background-color: #f0f0f0; border-radius: 10px;  padding: 20px;">
                    <a href="{{ url('category/'.$categorys->slug.'/'.$product->slug) }}">
                        <img src="{{ asset('assets/uploads/product/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top img-fluid">
                        <div class="card-body">
                            <h5>{{ $product->name }}</h5>
                            <p>{{ $product->small_description }}</p>
                            <span class="float-start">{{ $product->selling_price }}</span>
                            <span class="float-end"><s>{{ $product->original_price }}</s></span>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection