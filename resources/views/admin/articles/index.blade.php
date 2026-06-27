@extends('admin.layouts.app')

@section('title', 'Articles')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Articles</h3>
  <div>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-sm btn-primary">Create</a>
    <a href="{{ route('admin.articles.export.pdf') }}" class="btn btn-sm btn-secondary">Export PDF</a>
  </div>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Title</th>
      <th>Author</th>
      <th>Published</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $a)
    <tr>
      <td>{{ $a->title }}</td>
      <td>{{ $a->author }}</td>
      <td>{{ $a->is_published ? 'Yes' : 'No' }}</td>
      <td>
        <a href="{{ route('admin.articles.edit', $a) }}" class="btn btn-sm btn-warning">Edit</a>
        <form method="POST" action="{{ route('admin.articles.destroy', $a) }}" style="display:inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $articles->links() }}

@endsection
