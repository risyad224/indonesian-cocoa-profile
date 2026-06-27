@extends('admin.layouts.app')

@section('title', 'Edit Company Profile')

@section('content')
<h3>Edit Company Profile</h3>
<form method="POST" action="{{ route('admin.company-profiles.update', $companyProfile) }}" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input name="title" class="form-control" value="{{ old('title', $companyProfile->title) }}">
    @error('title')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Slug</label>
    <input name="slug" class="form-control" value="{{ old('slug', $companyProfile->slug) }}">
    @error('slug')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Excerpt</label>
    <textarea name="excerpt" class="form-control">{{ old('excerpt', $companyProfile->excerpt) }}</textarea>
    @error('excerpt')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Content</label>
    <textarea name="content" class="form-control">{{ old('content', $companyProfile->content) }}</textarea>
    @error('content')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Vision</label>
    <textarea name="vision" class="form-control">{{ old('vision', $companyProfile->vision) }}</textarea>
    @error('vision')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Mission</label>
    <textarea name="mission" class="form-control">{{ old('mission', $companyProfile->mission) }}</textarea>
    @error('mission')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
    @if($companyProfile->image)<img src="{{ $companyProfile->image }}" class="mt-2" style="max-width:150px">@endif
    @error('image')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="form-check mb-3">
    <input type="hidden" name="is_active" value="0">
    <input type="checkbox" name="is_active" class="form-check-input" id="active" value="1" {{ old('is_active', $companyProfile->is_active) ? 'checked' : '' }}>
    <label class="form-check-label" for="active">Active</label>
  </div>
  <button class="btn btn-primary">Save</button>
</form>
@endsection
