<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index() {
        return Comment::all();
    }

    public function show(Comment $comment) {
        return $comment->load('user');;
    }

    public function store(Request $request) {
        $request->validate([
            'body' => 'required|string',
            'article_id' => 'required|exists:articles,id'
        ]);
        $comment = new Comment();
        $comment->body = $request->input('body');
        $comment->user_id = Auth::id();
        $comment->article_id = $request->input('article_id');
        $comment->save();

        return response()->json($comment, 201);
    }

    public function update(Request $request, Comment $comment) {
        if ($comment->user_id != Auth::id()) {
            return response()->json([
                'message' => 'Access denied'], 403);
        }
        $request->validate([
            'body' => 'required|string'
        ]);
        $comment->body = $request->input('body');
        $comment->save();

        return response()->json($comment, 200);
    }

    public function delete(Request $request, Comment $comment) {
        if ($comment->user_id != Auth::id()) {
            return response()->json([
                'message' => 'Access denied'], 403);
        }
        $comment->delete();

        return response()->json(null, 204);
    }
}
