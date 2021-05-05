<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;


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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


Auth::routes();


Route::get('/home', function () {
    return redirect('/posts');
});


Route::get('/delete-blank-post', [PostController::class, 'deleteBlank']);
Route::get('/posts-archive', [PostController::class, 'archive']);
Route::get('/posts/{id}/restore', [PostController::class, 'restore']);

Route::resource('comments', CommentController::class);

Route::resource('posts', PostController::class);

//Post Methods
// Route::get('/posts', 'PostController@index');
// Route::get('/posts/create', 'PostController@create');
// Route::post('/posts', 'PostController@store');
// Route::get('/posts/{id}', 'PostController@show');
// Route::get('/posts/{id}/edit', 'PostController@edit');
// Route::put('/posts/{id}', 'PostController@update');
// Route::delete('/posts/{id}', 'PostController@destroy');


