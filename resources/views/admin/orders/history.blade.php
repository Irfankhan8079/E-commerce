@extends('layouts.admin')

@section('titel')
Orders
@endsection

@section('content')
<!-- @include('layouts.inc.frontendslider') -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Order History</h4>
                    <a href="{{ url('orders') }}" class="btn btn-warning text-white float-right">New Orders</a>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    No Product
                                </th>
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
                                <td>{{ $item->id}}</td>
                                <td>{{ date('d-m-Y', strtotime($item->created_at) )}}</td>
                                <td>{{ $item->tracking_no}}</td>
                                <td>{{ $item->total_price}}</td>
                                <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                                <td><a href="{{ url('admin/view-order/'.$item->id) }}" class="btn btn-primary">View</a></td>
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

