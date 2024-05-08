@extends('layouts.inc.front')

@section('titel')
Category
@endsection

@section('content')
@include('layouts.inc.frontendslider')
<div class="py-5">
    <div class="container">
        <div class="row">
            <h2>All Category</h2>
            <div class="owl-carousel category-carousel owl-theme">
                @foreach ($categorys as $category)
                <a href="{{ url('category/' .$category->slug)}}">
                    <div class="item">
                        <div class="card custom-card" style="background-color: #f0f0f0; border-radius: 10px;  padding: 20px;">
                            <img src="{{ asset('assets/uploads/category/' . $category->image) }}" alt="{{ $category->name }}" class="card-img-top img-fluid">
                            <div class="card-body">
                                <h5>{{ $category->name }}</h5>
                                <p>{{ $category->description }}</p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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