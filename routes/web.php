<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/users/create', [UserController::class,'create']);

Route::post('/users', [UserController::class,'store']);

Route::post('/welcome',[UserController::class,'userLogin']);

Route::get('/posts/create',[PostController::class,'create']);

Route::post('/posts',[PostController::class,'store']);

Route::get('/posts/index',[PostController::class,'index']);

Route::get('/posts/index/getUserDetails',[UserController::class,'getUserDetails']);

Route::get('/delete/{post_id}',[PostController::class,'delete']);

Route::get('/update/{post_id}',[PostController::class,'show']);

Route::post('/update',[PostController::class,'update']);

Route::post('/posts/post_id',[UserController::class,'userLogin']);

Route::get('/comments/{post_id}',[CommentController::class,'index']);

Route::post('/comments/{post_id}',[CommentController::class,'store']);

Route::get('/delete/comment/{comment_id}',[CommentController::class,'delete']);

Route::get('/update/comment/{comment_id}',[CommentController::class,'show']);

Route::post('/update/comment',[CommentController::class,'update']);

Route::get('/logout', function () {
    if(Session()->has('user')){
        session()->pull('user');
    }
    return redirect('/');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
