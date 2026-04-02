<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;

Route::get('/', [MovieController::class,'load'])->name('index');

Route::post('/upload', [MovieController::class, 'upload'])->name('movie.upload');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');


Route::post('/signup', [UserController::class, 'signup'])->name('user.signup');
Route::post('/login', [UserController::class, 'login'])->name('user.login');
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('/upload', [MovieController::class, 'index'])->name('upload');

Route::get("/upload/{name}",[MovieController::class,"update_genra"])->name("genra.update");

Route::post('/upload', [MovieController::class, 'upload'])->name('movie.upload');
Route::get('/movies/{id}', [MovieController::class, 'show'])->name('movies.show');




Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::put('/movies/{id}', [MovieController::class, 'update'])->name('movies.update');
Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');

