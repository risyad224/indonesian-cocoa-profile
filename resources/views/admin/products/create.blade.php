@extends('admin.layouts.app')

@section('title', 'Create Product')

@section('content')
<h3>Create Product</h3>
<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input name="name" class="form-control" value="{{ old('name') }}">
    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Category</label>
    <input name="category" class="form-control" value="{{ old('category') }}">
    @error('category')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    @error('description')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Specification</label>
    <textarea name="specification" class="form-control">{{ old('specification') }}</textarea>
    @error('specification')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
    @error('image')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="form-check mb-3">
    <input type="hidden" name="is_featured" value="0">
    <input type="checkbox" name="is_featured" class="form-check-input" id="feature" value="1" {{ old('is_featured', 0) ? 'checked' : '' }}>
    <label class="form-check-label" for="feature">Featured</label>
  </div>
  <button class="btn btn-primary">Save</button>
</form>
@endsection
