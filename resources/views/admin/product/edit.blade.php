@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Add product</h4>
    </div>
    <form action="{{ url('update-products/'.$products->id ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-12 col-md-12 mb-4">
                        <select class="form-control" id="exampleFormControlSelect1" name="cate_id">
                            <option value="">
                            {{ $products->category->name }}
                            </option>
                        </select>
                        @error('cate_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <!-- <label class="form-label font-w600">Name<span class="text-danger scale5 ms-2">*</span></label> -->
                        <input type="text" class="form-control solid" placeholder="Name" aria-label="name" name="name" value="{{ $products->name}}" value="{{ old('name') }}">
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <!-- <label class="form-label font-w600">Slug<span class="text-danger scale5 ms-2">*</span></label> -->
                        <input type="text" class="form-control solid" placeholder="Slug" aria-label="name" name="slug" value="{{ $products->slug}}" value="{{ old('slug') }}">
                        @error('slug')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <!-- <label class="form-label font-w600">Description<span class="text-danger scale5 ms-2">*</span></label> -->
                        <textarea name="small_description" class="form-control solid" placeholder="Small Description">{{ old('small_description') }} {{ $products->small_description}}</textarea>
                        @error('small_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <!-- <label class="form-label font-w600">Description<span class="text-danger scale5 ms-2">*</span></label> -->
                        <textarea name="description" class="form-control solid" placeholder="Description">{{ old('description') }} {{ $products->description}}</textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <!-- <label class="form-label font-w600">Slug<span class="text-danger scale5 ms-2">*</span></label> -->
                        <input type="number" class="form-control solid" placeholder="Original Price" aria-label="name" name="original_price" value="{{ $products->original_price}}" value="{{ old('original_price') }}">
                        @error('original_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <!-- <label class="form-label font-w600">Slug<span class="text-danger scale5 ms-2">*</span></label> -->
                        <input type="number" class="form-control solid" placeholder="Selling Price" aria-label="name" name="selling_price" value="{{ $products->selling_price}}" value="{{ old('selling_price') }}">
                        @error('selling_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <!-- <label class="form-label font-w600">Slug<span class="text-danger scale5 ms-2">*</span></label> -->
                        <input type="number" class="form-control solid" placeholder="Quantity" aria-label="name" name="qty" value="{{ $products->qty}}" value="{{ old('qty') }}">
                        @error('qty')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <!-- <label class="form-label font-w600">Slug<span class="text-danger scale5 ms-2">*</span></label> -->
                        <input type="number" class="form-control solid" placeholder="Tax" aria-label="name" name="tax" value="{{ $products->tax}}" value="{{ old('tax') }}">
                        @error('tax')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <!-- <label class="form-label font-w600">meta_titel<span class="text-danger scale5 ms-2">*</span></label> -->
                        <input type="text" class="form-control solid" placeholder="Meta Titel" aria-label="name" name="meta_titel" value="{{ $products->meta_titel}}" value="{{ old('meta_titel') }}">
                        @error('meta_titel')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <!-- <label class="form-label font-w600">meta_descrip<span class="text-danger scale5 ms-2">*</span></label> -->
                        <textarea name="meta_description" class="form-control solid" placeholder="Meta Description">{{ old('meta_description') }} {{ $products->meta_description}}</textarea>
                        @error('meta_description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <!-- <label class="form-label font-w600">meta_descrip<span class="text-danger scale5 ms-2">*</span></label> -->
                        <textarea name="meta_keywords" class="form-control solid" placeholder="Meta keywords">{{ old('meta_keywords') }} {{ $products->meta_keywords}}</textarea>
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
                        @if($products->image)
                            <img src="{{ asset('assets/uploads/product/' . $products->image) }}" alt="{{ $products->name }}" style="max-width: 100px;">
                        @endif
                    </div>

                    <div class="col-xl-6 col-md-6 mb-4">
                        <label class="form-label font-w600">Status<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="checkbox" class="form-control check solid" name="status" value="1" {{ $products->status == 1 ? 'checked' : '' }}  style="margin: -40px 0 0 -185px;">
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <label class="form-label font-w600">Trending<span class="text-danger scale5 ms-2">*</span></label>
                        <input type="checkbox" class="form-control check solid" name="trending" value="1" {{ $products->trending == 1 ? 'checked' : '' }}  style="margin: -40px 0 0 -170px;">
                        @error('trending')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-end">
                    <div>
                        <a href="{{ url('products')}} " class="btn btn-secondary me-3">Close</a>
                        <input type="submit" name="submit" class="btn btn-primary" value="submit">
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>
@endsection