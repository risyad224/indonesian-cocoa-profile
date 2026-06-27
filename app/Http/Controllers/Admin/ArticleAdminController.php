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

    public function store(\App\Http\Requests\StoreArticleRequest $request)
    {
        $data = $request->validated();
        $data['is_published'] = $request->boolean('is_published');
        $data['published_at'] = $data['is_published'] ? now() : null;
        $data['author'] = auth()->user()->name ?? 'Admin';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $base64 = base64_encode($file->get());
            $mime = $file->getClientMimeType();
            $data['image'] = "data:{$mime};base64,{$base64}";
        }

        Article::create($data);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel dibuat');
    }

    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(\App\Http\Requests\UpdateArticleRequest $request, Article $article)
    {
        $data = $request->validated();
        $data['is_published'] = $request->boolean('is_published');

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $base64 = base64_encode($file->get());
            $mime = $file->getClientMimeType();
            $data['image'] = "data:{$mime};base64,{$base64}";
        } else {
            unset($data['image']);
        }

        if ($data['is_published'] && !$article->published_at) {
            $data['published_at'] = now();
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel diperbarui');
    }

    public function destroy(Article $article)
    {
        // Vercel Base64 handling - no file to delete on disk
        $article->delete();
        return redirect()->route('admin.articles.index')->with('success', 'Artikel dihapus');
    }

    public function exportPdf()
    {
        $articles = Article::select('id', 'title', 'excerpt', 'author', 'created_at', 'published_at', 'is_published')->get();
        $pdf = Pdf::loadView('admin.articles.pdf', compact('articles'));
        return $pdf->download('articles.pdf');
    }
}
