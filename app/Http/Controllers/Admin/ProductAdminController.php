<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'specification' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_featured' => 'nullable|boolean',
        ]);

        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $base64 = base64_encode(file_get_contents($file));
            $mime = $file->getClientMimeType();
            $data['image'] = "data:{$mime};base64,{$base64}";
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Produk dibuat');
    }

    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'specification' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_featured' => 'nullable|boolean',
        ]);

        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $base64 = base64_encode(file_get_contents($file));
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
        $products = Product::all();
        $pdf = Pdf::loadView('admin.products.pdf', compact('products'));
        return $pdf->download('products.pdf');
    }
}
