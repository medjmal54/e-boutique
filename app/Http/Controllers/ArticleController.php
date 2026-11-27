<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    public function index(): View
    {
        $articles = Article::where('actif', true)
            ->latest()
            ->paginate(6);

        return view('shop.index', compact('articles'));
    }

    public function parCategorie(string $categorie = 'toutes'): string
    {
        return 'Articles de la categorie :' .$categorie;
    }

    public function show(string $slug, string $id): View
    {
        $article = Article::where('slug', $slug)
            ->whereKey($id)
            ->where('actif', true)
            ->firstOrFail();

        return view('shop.show', compact('article'));
    }
}
