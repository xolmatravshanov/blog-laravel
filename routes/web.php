<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\CommentController;
use \App\Http\Controllers\SubscriberController;
use \App\Http\Controllers\TagController;

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
    return view('index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('/blog', BlogController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/comment', CommentController::class);
    Route::resource('/subscriber', SubscriberController::class);
    Route::resource('/tag', TagController::class);
});




// COMMAND-> php artisan route:list
// Prefix example || prefixed all the routes user/blog user/blog/create
/*Route::group(['middleware' => 'auth', 'prefix' => 'user'], function () {
    Route::resource('/blog', [BlogController::class]);
    Route::group(['middleware' => 'admin'], function () {
        Route::resource('/user', [OffensiveWordController::class]);
    });
});*/


// Using group inside  group
/*Route::group(['middleware' => 'auth'], function () {
    Route::resource('/blog', [BlogController::class]);
    Route::group(['middleware' => 'admin'], function () {
        Route::resource('/user', [OffensiveWordController::class]);
    });
});*/


//Route::resource('/blog', [BlogController::class])->middleware(['auth']);
//Route::resource('/blog', [BlogController::class])->only(['index', 'create']);
//Route::resource('/blog', [BlogController::class])->except(['destroy']);
