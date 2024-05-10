@extends('layouts.admin')

@section('titel')
Registered Users
@endsection

@section('content')
<!-- @include('layouts.inc.frontendslider') -->
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4 class="text-white">Registered Users</h4>
                </div>
                <div class="card-body">
                    @if ($users->isEmpty())
                    <div class="alert alert-danger" role="alert">
                        <p>No records found.</p>
                    </div>
                    @else
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    User ID
                                </th>
                                <th>
                                    User Name
                                </th>
                                <th>
                                    User Email
                                </th>
                                <th>
                                    User Phone
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id}}</td>
                                <td>{{ $user->name. " ".$user->lname }}</td>
                                <td>{{ $user->email}}</td>
                                <td>{{ $user->phone}}</td>
                                <td><a href="{{ url('view-user/'.$user->id) }}" class="btn btn-primary">View</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection