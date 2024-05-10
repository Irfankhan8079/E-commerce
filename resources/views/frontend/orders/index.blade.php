@extends('layouts.inc.front')

@section('titel')
My Orders
@endsection

@section('content')
<!-- @include('layouts.inc.frontendslider') -->
<div class="py-3 mb-4 shodow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{ url('/')}}">Home</a> /
            <a href="{{ url('my-orders')}}">My Orders</a>
        </h6>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>My Orders</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    Orders Date
                                </th>
                                <th>
                                    Tracking Number
                                </th>
                                <th>
                                    Total Price
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                            <tr>

                                <td>{{ date('d-m-Y', strtotime($item->created_at) )}}</td>
                                <td>{{ $item->tracking_no}}</td>
                                <td>{{ $item->total_price}}</td>
                                <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                                <td><a href="{{ url('view-order/'.$item->id) }}" class="btn btn-primary">View</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection