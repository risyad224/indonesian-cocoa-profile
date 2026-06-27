@extends('admin.layouts.app')

@section('title', 'Company Profiles')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h3 class="page-title">Company Profiles</h3>
  <a href="{{ route('admin.company-profiles.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Create New</a>
</div>

<div class="card shadow-sm border-0">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="bg-light">
          <tr>
            <th class="ps-4">Title</th>
            <th>Status</th>
            <th class="text-end pe-4">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($profiles as $profile)
          <tr>
            <td class="ps-4 fw-medium">{{ $profile->title }}</td>
            <td>
              @if($profile->is_active)
                <span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">Active</span>
              @else
                <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25">Inactive</span>
              @endif
            </td>
            <td class="text-end pe-4">
              <a href="{{ route('admin.company-profiles.edit', $profile) }}" class="btn btn-sm btn-outline-primary" title="Edit"><i class="bi bi-pencil"></i></a>
              <form method="POST" action="{{ route('admin.company-profiles.destroy', $profile) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this profile?');">
                @csrf 
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" title="Delete"><i class="bi bi-trash"></i></button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="3" class="text-center py-4 text-muted">No profiles found. Click "Create New" to add one.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  @if($profiles->hasPages())
  <div class="card-footer bg-white border-top py-3 px-4 d-flex justify-content-end">
    {{ $profiles->links() }}
  </div>
  @endif
</div>
@endsection
