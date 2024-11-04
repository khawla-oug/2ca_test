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


//listing posts
Route::get('/test-posts', function() {
    return app(PostController::class)->index();
})->name('posts.index'); // on a nommé la route pour referencer en index


//form to add a new post
/*Route::get('/create-posts', function() {
    return app(PostController::class)->create();
})->name('posts.create');*/

//create and store category
Route::get('/create-posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/create-posts', [PostController::class, 'store'])->name('posts.store');


//to delete the post
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::resource('/categories/index', CategoryController::class);

                                    // operation for categories

//listing categories
Route::get('/test-categories', function() {
    return app(CategoryController::class)->index();
})->name('categories.index'); 

//delete category
Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

//edit form category
//listing categories
Route::get('/edit-categories', function() {
    return app(CategoryController::class)->index();
})->name('categories.edit'); 

//update the category
Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('categories.update');

//create and store category
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');





