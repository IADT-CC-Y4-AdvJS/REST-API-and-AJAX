<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index() {
        return Article::all()->load('category', 'user');
    }

    public function show(Article $article) {
        return $article->load('category', 'comments', 'user');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);
        $article = new Article();
        $article->title = $request->input('title');
        $article->body = $request->input('body');
        $article->category_id = $request->input('category_id');
        $article->user_id = Auth::id();
        $article->save();

        return response()->json($article, 201);
    }

    public function update(Request $request, Article $article) {
        if ($article->user_id != Auth::id()) {
            return response()->json([
                'message' => 'Access denied'], 403);
        }
        $request->validate([
            'title' => 'required|string',
            'body' => 'required|string',
            'category_id' => 'required|exists:categories,id'
        ]);
        $article->update($request->all());

        return response()->json($article, 200);
    }

    public function delete(Request $request, Article $article) {
        if ($article->user_id != Auth::id()) {
            return response()->json([
                'message' => 'Access denied'], 403);
        }
        DB::transaction(function() use ($article) {
            $article->comments()->delete();
            $article->delete();
        });
        
        return response()->json(null, 204);
    }
}
