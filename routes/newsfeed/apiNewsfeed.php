<?php

use App\Http\Controllers\Newsfeed\NewsfeedController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware(['auth'])->group(function () {

Route::get('/newsfeed', [NewsfeedController::class, 'apiShow'])->name('view-newsfeed');
});

