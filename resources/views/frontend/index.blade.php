@extends('layouts.inc.front')

@section('titel')
welcome to E-Shop
@endsection

@section('content')
@include('layouts.inc.frontendslider')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Featured Products</h2>
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach ($featured_products as $product)
                <a href="{{ url('category/'.$product->category->slug.'/'.$product->slug) }}">
                    <div class="item">
                        <div class="card custom-card" style="background-color: #f0f0f0; border-radius: 10px;  padding: 20px;">
                            <img src="{{ asset('assets/uploads/product/' . $product->image) }}" alt="{{ $product->name }}" class="card-img-top img-fluid">
                            <div class="card-body">
                                <h5>{{ $product->name }}</h5>
                                <p>{{ $product->small_description }}</p>
                                <span class="float-start">{{ $product->selling_price }}</span>
                                <span class="float-end"><s>{{ $product->original_price }}</s></span>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>


<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>Trendig Category</h2>
            <div class="owl-carousel category-carousel owl-theme">
                @foreach ($featured_category as $category)
                <a href="{{ url('category/'.$category->slug)}}">
                    <div class="item">
                        <div class="card custom-card" style="background-color: #f0f0f0; border-radius: 10px;  padding: 20px;">
                            <img src="{{ asset('assets/uploads/category/' . $category->image) }}" alt="{{ $category->name }}" class="card-img-top img-fluid">
                            <div class="card-body">
                                <h5>{{ $category->name }}</h5>
                                <p>{{ $category->description }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    $(document).ready(function() {
        $('.featured-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.category-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        });
    });
</script>
@endsection