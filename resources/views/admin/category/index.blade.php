@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-body">
        <h4>Category Page</h4>
        <div class="table-responsive">
            @if ($categories->isEmpty())
            <div class="alert alert-danger" role="alert">
                <p>No records found.</p>
            </div>
            @else
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Popular</th>
                        <th>Meta Title</th>
                        <th>Meta Description</th>
                        <th>Image</th>
                        <th>Meta Keywords</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->description }}</td>
                        <td>{{ $category->status }}</td>
                        <td>{{ $category->popular }}</td>
                        <td>{{ $category->meta_titel }}</td>
                        <td>{{ $category->meta_descrip }}</td>
                        <td>
                            <img src="{{ asset('assets/uploads/category/' . $category->image) }}" alt="{{ $category->name }}" style="max-width: 100px;">
                        </td>
                        <td>{{ $category->meta_keywords }}</td>
                        <td>
                            <a href="{{ url('edit-category/'.$category->id) }}" class="btn btn-link" onclick="return confirmEdit()">
                                <i class="material-icons" style="color: blue;">edit</i>
                            </a>
                            <a href="{{ url('delete-category/'.$category->id) }}" class="btn btn-link" onclick="return confirmDelete()">
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