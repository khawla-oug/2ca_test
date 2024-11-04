<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;


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

Route::get('/', function () {
    return view('homee');
});



/*Route::get('/posts', function () {
    return view('posts.index');
});*/


/*
Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
});

// Group routes that require the 'admin' role
Route::middleware(['role:admin'])->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
});
*/
Route::get('/home', 'HomeController@index')->name('home');



Auth::routes();

//Route::resource('posts', PostController::class);

/*Route::get('/test-posts', function() {
    return app(App\Http\Controllers\PostController::class)->index();
});*/

Route::get('/test-posts', function() {
    return app(PostController::class)->index();
})->name('posts.index'); // on a nommé la route pour referencer en index

Route::get('/create-posts', function() {
    return app(PostController::class)->create();
})->name('posts.create');

Route::resource('categories', CategoryController::class);
//Route::get('/categories', [App\Http\Controllers\PostController::class, 'index']);

