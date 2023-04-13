<?php

use App\Http\Controllers\Web\CommentController;
use App\Http\Controllers\Web\PostController;
use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [WebController::class, 'index']);
Route::get('/statistics', [WebController::class, 'statistics'])->name('statistics');
Route::resource('/posts', PostController::class);
Route::resource('/comments', CommentController::class);
