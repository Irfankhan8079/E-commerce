@extends('layouts.inc.front')

@section('titel')
My Orders Details
@endsection

@section('content')
<!-- @include('layouts.inc.frontendslider') -->
<div class="py-3 mb-4 shodow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/')}}">Home</a> /
            <a href="{{ url('view-order', ['id' => $orders]) }}">My View</a>
        </h6>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if ($orders->count() > 0)
                <div class="card-header bg-primary">
                    <h4 class="text-white">My Orders
                        <a href="{{ url('my-orders') }}" class="btn btn-warning text-white float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4> Shipping Details </h4>
                            <hr>
                            <div class="form-group">
                                <label class="badge bg-primary mb-1 " style="font-size: 15px;">First Name</label>
                                <div class="border p-2">{{ $orders->fname }}</div>
                            </div>
                            <div class="form-group">
                                <label class="badge bg-secondary mb-1 mt-1" style="font-size: 15px;">Last Name</label>
                                <div class="border p-2">{{ $orders->lname }}</div>
                            </div>
                            <div class="form-group">
                                <label class="badge bg-primary mb-1 mt-1" style="font-size: 15px;">Email</label>
                                <div class="border p-2">{{ $orders->email }}</div>
                            </div>
                            <div class="form-group">
                                <label class="badge bg-secondary mb-1 mt-1" style="font-size: 15px;">Contact No</label>
                                <div class="border p-2">{{ $orders->phone }}</div>
                            </div>
                            <div class="form-group">
                                <label class="badge bg-primary mb-1 mt-1" style="font-size: 15px;">Shipping Address</label>
                                <div class="border p-2"> {{$orders->address1}},<br>
                                    {{$orders->address2}},<br>
                                    {{$orders->city}},<br>
                                    {{$orders->state}},<br>
                                    {{$orders->country}}<br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="badge bg-secondary mb-1 mt-1" style="font-size: 15px;">Zip Code</label>
                                <div class="border p-2">{{ $orders->pincode }}</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4> Orders Details </h4>
                            <hr>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Quantity
                                        </th>
                                        <th>
                                            Price
                                        </th>
                                        <th>
                                            Image
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderitems as $item)
                                    <tr>
                                        <td>{{ $item->products->name}}</td>
                                        <td>{{ $item->product_qty}}</td>
                                        <td>{{ $item->price}}</td>
                                        <td>
                                            <img src="{{ asset('assets/uploads/product/'.$item->products->image) }}" alt="{{ $item->products->name }}" style="width: 50px;">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4 class="px-2"> Grand Total : <span class="float-end">{{ $orders->total_price}}</span></h4>
                        </div>
                    </div>
                    @else
                    <div class="card-body text-center">
                        <img src="{{ asset('assets/images/checkout.avif')}}" style="width: 400px;" height="300px" alt="Empty Cart Image">
                        <h2>Your <i class="fa fa-shopping-cart"></i> Orders is Empty</h2>
                        <p>No items in your checkout. Please add items to proceed.</p>
                        <a href="{{ url('category')}}" class="btn btn-outline-primary float-end">Continue Shopping</a>
                    </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
</div>


@endsection