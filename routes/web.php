<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', [PostController::class,'index']);
Route::get('/post/{id}', [PostController::class,'showPost']);
Route::get('/posts/{id}', [PostController::class,'showPosts']);

Route::middleware('auth')->group(function () {
    Route::get('/postEdit/{id}', [PostController::class,'showPostEdit']);
    Route::get('/createblog/{id}',[PostController::class,'createblog']);
    Route::get('/manageblog/{id}',[PostController::class,'manageblog']);
    Route::post('/writePost',[PostController::class,'writePost'])->name('writePost');
    Route::post('/editPost/{id}',[PostController::class,'editPost'])->name('editPost');
    Route::delete('/delPost/{id}',[PostController::class,'delPost'])->name('delPost');
});


require __DIR__.'/auth.php';
