<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);
Route::resource('blogs', BlogController::class);


Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');

Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');