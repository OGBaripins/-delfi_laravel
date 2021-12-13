<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCommentController;
use phpDocumentor\Reflection\Types\Resource_;

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

Route::resource('post', PostController::class);

Route::get('/post/searchAll/{param}', [PostController::class, 'search']);

Route::get('/post/searchStarting/{param}', [PostController::class, 'search']);

Route::get('/post/searchEnding/{param}', [PostController::class, 'search']);

// Route::get('/post', [PostController::class, 'index']);
// Route::get('/postComment', [PostCommentController::class, 'index']);


// Route::post('/post', [PostController::class, 'store']);

// Route::post('/postComment', [PostCommentController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
