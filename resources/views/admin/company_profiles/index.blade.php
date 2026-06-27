@extends('admin.layouts.app')

@section('title', 'Company Profiles')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Company Profiles</h3>
  <a href="{{ route('admin.company-profiles.create') }}" class="btn btn-sm btn-primary">Create</a>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Title</th>
      <th>Active</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($profiles as $profile)
    <tr>
      <td>{{ $profile->title }}</td>
      <td>{{ $profile->is_active ? 'Yes' : 'No' }}</td>
      <td>
        <a href="{{ route('admin.company-profiles.edit', $profile) }}" class="btn btn-sm btn-warning">Edit</a>
        <form method="POST" action="{{ route('admin.company-profiles.destroy', $profile) }}" style="display:inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $profiles->links() }}
@endsection
