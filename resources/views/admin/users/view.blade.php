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
                    <h4 class="text-white">Users Details
                        <a href="{{ url('users') }}" class="btn btn-warning text-white float-right">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4> Shipping Details </h4>
                            <hr>
                            <div class="row">
                                <div class="form-group col-md-4 col-md-4">
                                    <label class="badge bg-primary mb-1 text-white" style="font-size: 15px;">Role</label>
                                    <div class="border p-2">{{ $users->role_as == '0' ? 'User' : 'Admin' }}</div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="badge bg-primary mb-1 text-white" style="font-size: 15px;">First Name</label>
                                    <div class="border p-2">{{ $users->name }}</div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="badge bg-primary mb-1 mt-1 text-white" style="font-size: 15px;">Last Name</label>
                                    <div class="border p-2">{{ $users->lname }}</div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="badge bg-primary mb-1 mt-1 text-white" style="font-size: 15px;">Email</label>
                                    <div class="border p-2">{{ $users->email }}</div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="badge bg-primary mb-1 mt-1 text-white" style="font-size: 15px;">Contact No</label>
                                    <div class="border p-2">{{ $users->phone }}</div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="badge bg-primary mb-1 mt-1 text-white" style="font-size: 15px;">Shipping Address 1</label>
                                    <div class="border p-2"> {{$users->address1}}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="badge bg-primary mb-1 mt-1 text-white" style="font-size: 15px;">Shipping Address 2</label>
                                    <div class="border p-2">
                                        {{$users->address2}}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="badge bg-primary mb-1 mt-1 text-white" style="font-size: 15px;">Shipping City</label>
                                    <div class="border p-2">
                                        {{$users->city}}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="badge bg-primary mb-1 mt-1 text-white" style="font-size: 15px;">Shipping State</label>
                                    <div class="border p-2">
                                        {{$users->state}}
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="badge bg-primary mb-1 mt-1 text-white" style="font-size: 15px;">Shipping Country</label>
                                    <div class="border p-2">
                                        {{$users->country}}<br>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="badge bg-primary mb-1 mt-1 text-white" style="font-size: 15px;">Zip Code</label>
                                    <div class="border p-2">{{ $users->pincode }}</div>
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