@extends('layouts.admin')

@section('titel')
My Orders
@endsection

@section('content')
<!-- @include('layouts.inc.frontendslider') -->

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">My Orders
                        <a href="{{ url('orders') }}" class="btn btn-warning text-white float-right">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4> Shipping Details </h4>
                            <hr>
                            <div class="form-group">
                                <label class="badge bg-primary mb-1 text-white" style="font-size: 15px;">First Name</label>
                                <div class="border p-2">{{ $orders->fname }}</div>
                            </div>
                            <div class="form-group">
                                <label class="badge bg-primary mb-1 mt-1 text-white" style="font-size: 15px;">Last Name</label>
                                <div class="border p-2">{{ $orders->lname }}</div>
                            </div>
                            <div class="form-group">
                                <label class="badge bg-primary mb-1 mt-1 text-white" style="font-size: 15px;">Email</label>
                                <div class="border p-2">{{ $orders->email }}</div>
                            </div>
                            <div class="form-group">
                                <label class="badge bg-primary mb-1 mt-1 text-white" style="font-size: 15px;">Contact No</label>
                                <div class="border p-2">{{ $orders->phone }}</div>
                            </div>
                            <div class="form-group">
                                <label class="badge bg-primary mb-1 mt-1 text-white" style="font-size: 15px;">Shipping Address</label>
                                <div class="border p-2"> {{$orders->address1}},<br>
                                    {{$orders->address2}},<br>
                                    {{$orders->city}},<br>
                                    {{$orders->state}},<br>
                                    {{$orders->country}}<br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="badge bg-primary mb-1 mt-1 text-white" style="font-size: 15px;">Zip Code</label>
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
                            <div class="mt-5 px-2">
                                <form action="{{ url('update-order/'. $orders->id )}}" method="post">
                                    @csrf
                                    <!-- @method('put') -->
                                    <label class="" style="font-size: 16px;">Order Status</label>
                                    <select class="form-group form-control" name="order_status" id="order_status">
                                        <option {{ $orders->status == '0' ? 'selected' : '' }} value="0">Pending</option>
                                        <option {{ $orders->status == '1' ? 'selected' : '' }} value="1">Completed</option>
                                    </select>

                                    <button class="btn btn-primary mt-3 float-right" type="submit">Update</button>
                                </form>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection