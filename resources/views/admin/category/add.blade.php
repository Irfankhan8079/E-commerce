@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add Category</h4>
    </div>
    <form action="{{ url('insert-category') }}"  method="POST" enctype="multipart/form-data">
    @csrf
        <div class="container-fluid">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-6 col-md-6 mb-4">
                        <!-- <label class="form-label font-w600">Name<span class="text-danger scale5 ms-2">*</span></label> -->
                        <input type="text" class="form-control solid" placeholder="Name" aria-label="name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <!-- <label class="form-label font-w600">Slug<span class="text-danger scale5 ms-2">*</span></label> -->
                        <input type="text" class="form-control solid" placeholder="Slug" aria-label="name" name="slug" value="{{ old('slug') }}">
                    @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <!-- <label class="form-label font-w600">Description<span class="text-danger scale5 ms-2">*</span></label> -->
                        <textarea name="description" class="form-control solid" placeholder="Description" >{{ old('description') }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                        
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <!-- <label class="form-label font-w600">meta_titel<span class="text-danger scale5 ms-2">*</span></label> -->
                        <input type="text" class="form-control solid" placeholder="Meta Titel" aria-label="name" name="meta_titel" value="{{ old('meta_titel') }}">
                    @error('meta_titel')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <!-- <label class="form-label font-w600">meta_descrip<span class="text-danger scale5 ms-2">*</span></label> -->
                        <textarea name="meta_descrip" class="form-control solid"  placeholder="Meta Description">{{ old('meta_descrip') }}</textarea>
                    @error('meta_descrip')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <!-- <label class="form-label font-w600">meta_descrip<span class="text-danger scale5 ms-2">*</span></label> -->
                        <textarea name="meta_keywords" class="form-control solid"  placeholder="Meta keywords">{{ old('meta_keywords') }}</textarea>
                    @error('meta_keywords')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <!-- <label class="form-label font-w600">image<span class="text-danger scale5 ms-2">*</span></label> -->
                        <input type="file" class="form-control solid" placeholder="image" aria-label="name" name="image" value="">
                    @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <label class="form-label font-w600">Status<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="checkbox" class="form-control check solid" name="status" value="1" style="margin: -40px 0 0 -185px;">
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <label class="form-label font-w600">Popular<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="checkbox" class="form-control check solid" name="popular" value="1" style="margin: -40px 0 0 -185px;">
                    @error('popular')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="card-footer text-end">
                    <div>
                        <a href="{{ url('categories')}} " class="btn btn-secondary me-3">Close</a>
                        <input type="submit" name="submit" class="btn btn-primary" value="submit">
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>
@endsection