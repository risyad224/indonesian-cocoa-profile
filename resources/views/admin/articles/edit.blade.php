@extends('admin.layouts.app')

@section('title', 'Edit Article')

@section('content')
<h3>Edit Article</h3>
<form method="POST" action="{{ route('admin.articles.update', $article) }}" enctype="multipart/form-data">
  @csrf @method('PUT')
  <div class="mb-3">
    <label class="form-label">Title</label>
    <input name="title" class="form-control" value="{{ old('title', $article->title) }}">
    @error('title')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Slug</label>
    <input name="slug" class="form-control" value="{{ old('slug', $article->slug) }}">
    @error('slug')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Excerpt</label>
    <textarea name="excerpt" class="form-control">{{ old('excerpt', $article->excerpt) }}</textarea>
    @error('excerpt')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Content</label>
    <textarea name="content" class="form-control">{{ old('content', $article->content) }}</textarea>
    @error('content')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
    @if($article->image)<img src="{{ asset('storage/' . $article->image) }}" alt="" style="max-width:150px" class="mt-2">@endif
    @error('image')<div class="text-danger">{{ $message }}</div>@enderror
  </div>
  <div class="mb-3 form-check">
    <input type="hidden" name="is_published" value="0">
    <input type="checkbox" name="is_published" value="1" class="form-check-input" id="pub" {{ old('is_published', $article->is_published) ? 'checked' : '' }}>
    <label class="form-check-label" for="pub">Published</label>
  </div>
  <button class="btn btn-primary">Save</button>
</form>
@endsection
