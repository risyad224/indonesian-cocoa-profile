<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductAdminController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $base64 = base64_encode($file->get());
            $mime = $file->getClientMimeType();
            $data['image'] = "data:{$mime};base64,{$base64}";
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk ditambahkan');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $base64 = base64_encode($file->get());
            $mime = $file->getClientMimeType();
            $data['image'] = "data:{$mime};base64,{$base64}";
        } else {
            unset($data['image']);
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk diperbarui');
    }

    public function destroy(Product $product)
    {
        // Vercel Base64 handling - no file to delete on disk

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk dihapus');
    }

    public function exportPdf()
    {
        $products = Product::select('id', 'name', 'category', 'description', 'is_featured', 'created_at')->get();
        $pdf = Pdf::loadView('admin.products.pdf', compact('products'));
        return $pdf->download('products.pdf');
    }
}
