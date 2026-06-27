<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class ArticleAdminController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:articles,slug',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'is_published' => 'nullable|boolean',
        ]);

        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('articles', 'public');
            $data['image'] = $path;
        }

        Article::create($data + ['author' => session('admin_name')]);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel dibuat');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|unique:articles,slug,' . $article->id,
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'is_published' => 'nullable|boolean',
        ]);

        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('image')) {
            if ($article->image) {
                Storage::disk('public')->delete($article->image);
            }
            $path = $request->file('image')->store('articles', 'public');
            $data['image'] = $path;
        } else {
            unset($data['image']);
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel diperbarui');
    }

    public function destroy(Article $article)
    {
        if ($article->image) {
            Storage::disk('public')->delete($article->image);
        }
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Artikel dihapus');
    }

    public function exportPdf()
    {
        $articles = Article::all();
        $pdf = Pdf::loadView('admin.articles.pdf', compact('articles'));
        return $pdf->download('articles.pdf');
    }
}
