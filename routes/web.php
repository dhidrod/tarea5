<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Models\Image;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\admin\UserController;

/*
Route::get('/', function () {
    return view('home');
})->name('home');;
*/

Route::get('/', [HomeController::class, 'index'])
     ->name('home');


// Images
     // Policies
     // Mostrar formulario de subida
     Route::get('/images/create', [ImageController::class, 'create'])
          ->name('images.create')
          ->middleware('auth');

     // Procesar subida
     Route::post('/images', [ImageController::class, 'store'])
          ->name('images.store')
          ->middleware('auth');

     // Mostrar formulario de edición
     Route::get('/images/{image}/edit', [ImageController::class, 'edit'])
          ->name('images.edit')
          ->middleware('auth');

     // Actualizar descripción
     Route::put('/images/{image}', [ImageController::class, 'update'])
          ->name('images.update')
          ->middleware('auth');

     // Eliminar imagen
     Route::delete('/images/{image}', [ImageController::class, 'destroy'])
          ->name('images.destroy')
          ->middleware('auth');
// Mostrar imagen
Route::get('/images/{image}', [ImageController::class, 'show'])
     ->name('images.show')
     ->middleware('auth');
// Ranking
Route::get('/ranking', [ImageController::class, 'ranking'])
     ->name('images.ranking');

// Comentarios
// Postear
Route::post('/images/{image}/comments', [CommentController::class, 'store'])
     ->name('comments.store')
     ->middleware('auth');
// Eliminar comentario
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
     ->name('comments.destroy')
     ->middleware('auth');

// Likes
// Crear o eliminar like (toggle)
Route::post('/images/{image}/like', [LikeController::class, 'toggle'])
     ->name('images.like')
     ->middleware('auth');

// Funciones de Administrador
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
     Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy']);
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
