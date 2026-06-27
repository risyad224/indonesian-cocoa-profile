@extends('admin.layouts.app')

@section('title', 'Articles')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h3 class="page-title">Manage Articles</h3>
  <div>
    <a href="{{ route('admin.articles.export.pdf') }}" class="btn btn-outline-secondary me-2"><i class="bi bi-file-earmark-pdf me-1"></i>Export PDF</a>
    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Create New</a>
  </div>
</div>

<div class="card shadow-sm border-0">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="bg-light">
          <tr>
            <th class="ps-4">Title</th>
            <th>Author</th>
            <th>Status</th>
            <th class="text-end pe-4">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($articles as $a)
          <tr>
            <td class="ps-4 fw-medium">{{ $a->title }}</td>
            <td>
              <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25">
                <i class="bi bi-person me-1"></i>{{ $a->author }}
              </span>
            </td>
            <td>
              @if($a->is_published)
                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">Published</span>
              @else
                <span class="badge bg-warning bg-opacity-10 text-warning border border-warning border-opacity-25">Draft</span>
              @endif
            </td>
            <td class="text-end pe-4">
              <a href="{{ route('admin.articles.edit', $a) }}" class="btn btn-sm btn-outline-primary" title="Edit"><i class="bi bi-pencil"></i></a>
              <form method="POST" action="{{ route('admin.articles.destroy', $a) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this article?');">
                @csrf 
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" title="Delete"><i class="bi bi-trash"></i></button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="4" class="text-center py-4 text-muted">No articles found. Click "Create New" to add one.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  @if($articles->hasPages())
  <div class="card-footer bg-white border-top py-3 px-4 d-flex justify-content-end">
    {{ $articles->links() }}
  </div>
  @endif
</div>
@endsection
