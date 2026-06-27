@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
  <h3 class="page-title">Manage Products</h3>
  <div>
    <a href="{{ route('admin.products.export.pdf') }}" class="btn btn-outline-secondary me-2"><i class="bi bi-file-earmark-pdf me-1"></i>Export PDF</a>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg me-1"></i> Create New</a>
  </div>
</div>

<div class="card shadow-sm border-0">
  <div class="card-body p-0">
    <div class="table-responsive">
      <table class="table table-hover align-middle mb-0">
        <thead class="bg-light">
          <tr>
            <th class="ps-4">Product Name</th>
            <th>Category</th>
            <th>Featured</th>
            <th class="text-end pe-4">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($products as $product)
          <tr>
            <td class="ps-4 fw-medium">
              <div class="d-flex align-items-center">
                @if($product->image)
                  <img src="{{ $product->image }}" alt="{{ $product->name }}" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
                @else
                  <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center text-muted" style="width: 40px; height: 40px;">
                    <i class="bi bi-image"></i>
                  </div>
                @endif
                {{ $product->name }}
              </div>
            </td>
            <td><span class="badge bg-info bg-opacity-10 text-info border border-info border-opacity-25">{{ $product->category }}</span></td>
            <td>
              @if($product->is_featured)
                <i class="bi bi-star-fill text-warning"></i>
              @else
                <i class="bi bi-star text-muted opacity-50"></i>
              @endif
            </td>
            <td class="text-end pe-4">
              <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-primary" title="Edit"><i class="bi bi-pencil"></i></a>
              <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                @csrf 
                @method('DELETE')
                <button class="btn btn-sm btn-outline-danger" title="Delete"><i class="bi bi-trash"></i></button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="4" class="text-center py-4 text-muted">No products found. Click "Create New" to add one.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  @if($products->hasPages())
  <div class="card-footer bg-white border-top py-3 px-4 d-flex justify-content-end">
    {{ $products->links() }}
  </div>
  @endif
</div>
@endsection
