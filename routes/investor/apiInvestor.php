<?php

use App\Http\Controllers\Investor\InvestorProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/investor-profile/{id}', [InvestorProfileController::class, 'apiShow'])->name('view-investor-profile');

