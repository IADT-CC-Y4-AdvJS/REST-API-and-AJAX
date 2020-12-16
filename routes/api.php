<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'guest:api'], function() {
  Route::post('login', [LoginController::class, 'login']);
  Route::post('register', [RegisterController::class, 'register']);
});

Route::group(['middleware' => 'auth:api'], function() {
  Route::post('logout', [LoginController::class, 'logout']);

  Route::get('categories', [CategoryController::class, 'index']);
  Route::get('categories/{category}', [CategoryController::class, 'show']);

  Route::get('articles', [ArticleController::class, 'index']);
  Route::get('articles/{article}', [ArticleController::class, 'show']);
  Route::post('articles', [ArticleController::class, 'store']);
  Route::put('articles/{article}', [ArticleController::class, 'update']);
  Route::delete('articles/{article}', [ArticleController::class, 'delete']);

  Route::get('comments', [CommentController::class, 'index']);
  Route::get('comments/{comment}', [CommentController::class, 'show']);
  Route::post('comments', [CommentController::class, 'store']);
  Route::put('comments/{comment}', [CommentController::class, 'update']);
  Route::delete('comments/{comment}', [CommentController::class, 'delete']);
});
