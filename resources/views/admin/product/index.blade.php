@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Products Page</h4>
        <div class="table-responsive">
            @if ($products->isEmpty())
            <div class="alert alert-danger" role="alert">
                <p>No records found.</p>
            </div>
            @else
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Original Price</th>
                        <th>Selling Price</th>
                        <!-- <th>Status</th>
                            <th>Trending</th> -->
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category ? $product->category->name : 'N/A' }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->original_price }}</td>
                        <td>{{ $product->selling_price }}</td>
                        <!-- <td>{{ $product->status }}</td>
                                <td>{{ $product->trending }}</td> -->
                        <td>
                            <img src="{{ asset('assets/uploads/product/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 100px;">
                        </td>
                        <td>
                            <a href="{{ url('edit-products/'.$product->id) }}" class="btn btn-link" onclick="return confirmEdit()">
                                <i class="material-icons" style="color: blue;">edit</i>
                            </a>
                            <a href="{{ url('delete-products/'.$product->id) }}" class="btn btn-link" onclick="return confirmDelete()">
                                <i class="material-icons" style="color: red;">delete</i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@endsection
<script>
    function confirmEdit() {
        return confirm('Are you sure you want to update this category?');
    }

    function confirmDelete() {
        return confirm('Are you sure you want to delete this category?');
    }
</script>