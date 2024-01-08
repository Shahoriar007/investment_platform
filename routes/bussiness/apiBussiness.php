<?php

use App\Http\Controllers\Bussiness\BussinessProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/bussiness-profile/{id}', [BussinessProfileController::class, 'apiShow'])->name('view-bussiness-profile');

