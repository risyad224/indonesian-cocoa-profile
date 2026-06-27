@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('content')
<h3>Edit Product</h3>
<form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input name="name" class="form-control" value="{{ old('name', $product->name) }}">
    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Category</label>
    <input name="category" class="form-control" value="{{ old('category', $product->category) }}">
    @error('category')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
    @error('description')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Specification</label>
    <textarea name="specification" class="form-control">{{ old('specification', $product->specification) }}</textarea>
    @error('specification')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
    @if($product->image)<img src="{{ $product->image }}" class="mt-2" style="max-width:150px">@endif
    @error('image')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="form-check mb-3">
    <input type="hidden" name="is_featured" value="0">
    <input type="checkbox" name="is_featured" class="form-check-input" id="feature" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
    <label class="form-check-label" for="feature">Featured</label>
  </div>
  <button class="btn btn-primary">Save</button>
</form>
@endsection
