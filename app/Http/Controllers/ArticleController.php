<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index() {
        return Article::all();
    }

    public function show(Article $article) {
        return $article;
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string'
        ]);
        $article = Article::create($request->all());

        return response()->json($article, 201);
    }

    public function update(Request $request, Article $article) {
      $request->validate([
          'title' => 'required|string',
          'body' => 'required|string'
      ]);
      $article->update($request->all());

        return response()->json($article, 200);
    }

    public function delete(Request $request, Article $article) {
        $article->delete();

        return response()->json(null, 204);
    }
}
