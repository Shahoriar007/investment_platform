<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\StaterkitController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\AuthenticationController;

//Admin Panel login logout routes
require __DIR__ . '/auth/auth.php';

//Admin Panel users routes
require __DIR__ . '/users/users.php';

//Blog routes
require __DIR__ . '/blogs/blogs.php';

//Bussiness routes
require __DIR__ . '/bussiness/bussiness.php';
require __DIR__ . '/bussiness/apiBussiness.php';

//Investor routes
require __DIR__ . '/investor/investor.php';
require __DIR__ . '/investor/apiInvestor.php';


//post routes
require __DIR__ . '/posts/post.php';
require __DIR__ . '/posts/apiPost.php';

//newsfeed routes
require __DIR__ . '/newsfeed/apiNewsfeed.php';





Route::middleware(['auth'])->group(function () {

Route::get('/', [StaterkitController::class, 'home'])->name('admin-home');

});



