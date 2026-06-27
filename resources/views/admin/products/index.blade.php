@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Products</h3>
  <div>
    <a href="{{ route('admin.products.export.pdf') }}" class="btn btn-sm btn-secondary">Export PDF</a>
    <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-primary">Create</a>
  </div>
</div>

<table class="table table-striped">
  <thead>
    <tr>
      <th>Name</th>
      <th>Category</th>
      <th>Featured</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
      <td>{{ $product->name }}</td>
      <td>{{ $product->category }}</td>
      <td>{{ $product->is_featured ? 'Yes' : 'No' }}</td>
      <td>
        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
        <form method="POST" action="{{ route('admin.products.destroy', $product) }}" style="display:inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{ $products->links() }}
@endsection
