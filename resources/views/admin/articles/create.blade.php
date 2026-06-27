@extends('admin.layouts.app')

@section('title', 'Create Article')

@section('content')
<h3>Create Article</h3>
<form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data">
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
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
    @error('image')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3 form-check">
    <input type="hidden" name="is_published" value="0">
    <input type="checkbox" name="is_published" value="1" class="form-check-input" id="pub" {{ old('is_published', 1) ? 'checked' : '' }}>
    <label class="form-check-label" for="pub">Published</label>
  </div>
  <button class="btn btn-primary">Save</button>
</form>
@endsection
