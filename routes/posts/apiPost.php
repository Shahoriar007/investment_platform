<?php

use App\Http\Controllers\Post\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware(['auth'])->group(function () {

Route::get('/post/{id}', [PostController::class, 'apiShow'])->name('view-post');
});

