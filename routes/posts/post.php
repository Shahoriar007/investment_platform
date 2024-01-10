<?php

use App\Http\Controllers\Post\PostController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {


    // post profile resource route
    Route::get('/post', [PostController::class, 'index'])->name('post');
    Route::get('/post/create', [PostController::class, 'create'])->name('create-post');
    Route::post('/post', [PostController::class, 'store'])->name('store-post');
    Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('edit-post');
    Route::put('/post/{id}', [PostController::class, 'update'])->name('update-post');
    Route::delete('/post', [PostController::class, 'destroy'])->name('delete-post');

    Route::get('/fetch-profiles', [PostController::class, 'fetch'])->name('fetch-profiles');







});
