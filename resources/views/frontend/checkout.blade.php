@extends('layouts.inc.front')

@section('titel')
My Checkout
@endsection

@section('content')
<!-- @include('layouts.inc.frontendslider') -->
<div class="py-3 mb-4 shodow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/')}}">Home</a> /
            <a href="{{ url('checkout')}}">Checkout</a>
        </h6>
    </div>
</div>
<div class="container mt-5">
    <form action="{{ url('place-order')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-7">
                <div class="card">

                    <div class="card-body">
                        <h6>
                            Basic Details
                        </h6>
                        @php
                        $total = 0;
                        @endphp
                        <hr>
                        <div class="row checkout-form">
                            <div class="col-md-6">
                                <label for=""> First Name</label>
                                <input type="text" class="form-control firstname" value="{{ Auth::user()->name}}" name="fname" placeholder="Enter First Name">
                                <span id="fname_error" style="font-size: 18px; font-weight: 400; color: red;"></span>
                            </div>
                            <div class="col-md-6">
                                <label for=""> Last Name</label>
                                <input type="text" class="form-control lastname" value="{{ Auth::user()->lname}}" name="lname" placeholder="Enter Last Name">
                                <span id="lname_error" style="font-size: 18px; font-weight: 400; color: red;"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for=""> Email</label>
                                <input type="text" class="form-control email" value="{{ Auth::user()->email}}" name="email" placeholder="Enter Email">
                                <span id="email_error" style="font-size: 18px; font-weight: 400; color: red;"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for=""> Phone Number</label>
                                <input type="text" class="form-control phone" value="{{ Auth::user()->phone}}" name="phone" placeholder="Enter Phone Number">
                                <span id="phone_error" style="font-size: 18px; font-weight: 400; color: red;"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for=""> Address 1</label>
                                <input type="text" class="form-control address1" value="{{ Auth::user()->address1}}" name="address1" placeholder="Enter Address 1">
                                <span id="address1_error" style="font-size: 18px; font-weight: 400; color: red;"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for=""> Address 2</label>
                                <input type="text" class="form-control address2" value="{{ Auth::user()->address2}}" name="address2" placeholder="Enter Address 2">
                                <span id="address2_error" style="font-size: 18px; font-weight: 400; color: red;"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for=""> City</label>
                                <input type="text" class="form-control city" value="{{ Auth::user()->city}}" name="city" placeholder="Enter City">
                                <span id="city_error" style="font-size: 18px; font-weight: 400; color: red;"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for=""> State</label>
                                <input type="text" class="form-control state" value="{{ Auth::user()->state}}" name="state" placeholder="Enter State">
                                <span id="state_error" style="font-size: 18px; font-weight: 400; color: red;"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for=""> Country</label>
                                <input type="text" class="form-control country" value="{{ Auth::user()->country}}" name="country" placeholder="Enter Country">
                                <span id="country_error" style="font-size: 18px; font-weight: 400; color: red;"></span>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for=""> Pin Code</label>
                                <input type="text" class="form-control pincode" value="{{ Auth::user()->pincode}}" name="pincode" placeholder="Enter Pin Code">
                                <span id="pincode_error" style="font-size: 18px; font-weight: 400; color: red;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    @if ($cartItem->count() > 0)
                    <div class="card-body">
                        <h6>
                            Order Details
                        </h6>
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
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($cartItem as $item)
                                <tr>
                                    <td>{{ $item->products->name}}</td>
                                    <td>{{ $item->product_qty}}</td>
                                    <td>{{ $item->products->selling_price}}</td>
                                </tr>
                                @php
                                $total += $item->products->selling_price * $item->product_qty;
                                @endphp
                                @endforeach

                            </tbody>
                        </table>
                        <h4 class="px-2"> Grand Total : <span class="float-end">{{ $total}}</span></h4>
                        <hr>
                        <input type="hidden" name="payment_mode" value="COD">
                        <button type="submit" class="btn btn-success float-end w-100">Place Order | COD</button>
                        <button type="submit" class="btn btn-primary float-end w-100 mt-3 razorpay_btn">Pay With Razorpay</button>
                    </div>
                    @else
                    <div class="card-body text-center">
                        <img src="{{ asset('assets/images/checkout.avif')}}" style="width: 400px;" height="300px" alt="Empty Cart Image">
                        <h2>Your <i class="fa fa-shopping-cart"></i> Checkout is Empty</h2>
                        <p>No items in your checkout. Please add items to proceed.</p>
                        <a href="{{ url('category')}}" class="btn btn-outline-primary float-end">Continue Shopping</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
@endsection