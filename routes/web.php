<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;

/*
Route::get('/', function () {
    return view('home');
})->name('home');;
*/
Route::get('/', [HomeController::class, 'index'])
     ->name('home');


// Images
Route::get('/images/{image}', [ImageController::class,'show'])->name('images.show')->middleware('auth');
Route::post('/images/{image}/like', [LikeController::class,'store'])->name('images.like')->middleware('auth');
Route::post('/images/{image}/comments', [CommentController::class,'store'])->name('comments.store')->middleware('auth');



Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class)->only(['index', 'edit', 'update', 'destroy']);
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
