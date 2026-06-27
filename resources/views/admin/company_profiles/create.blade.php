@extends('admin.layouts.app')

@section('title', 'Create Company Profile')

@section('content')
<h3>Create Company Profile</h3>
<form method="POST" action="{{ route('admin.company-profiles.store') }}" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input name="title" class="form-control" value="{{ old('title') }}">
    @error('title')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Slug</label>
    <input name="slug" class="form-control" value="{{ old('slug') }}">
    @error('slug')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Excerpt</label>
    <textarea name="excerpt" class="form-control">{{ old('excerpt') }}</textarea>
    @error('excerpt')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Content</label>
    <textarea name="content" class="form-control">{{ old('content') }}</textarea>
    @error('content')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Vision</label>
    <textarea name="vision" class="form-control">{{ old('vision') }}</textarea>
    @error('vision')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Mission</label>
    <textarea name="mission" class="form-control">{{ old('mission') }}</textarea>
    @error('mission')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
    @error('image')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="form-check mb-3">
    <input type="hidden" name="is_active" value="0">
    <input type="checkbox" name="is_active" class="form-check-input" id="active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
    <label class="form-check-label" for="active">Active</label>
  </div>
  <button class="btn btn-primary">Save</button>
</form>
@endsection
