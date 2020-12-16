<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        return Category::all();
    }

    public function show(Category $category) {
        return $category->load('articles.user');;
    }
}