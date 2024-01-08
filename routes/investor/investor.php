<?php

use App\Http\Controllers\Investor\InvestorProfileController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {


    // investor profile resource route
    Route::get('/investor-profile', [InvestorProfileController::class, 'index'])->name('investor-profile');
    Route::get('/investor-profile/create', [InvestorProfileController::class, 'create'])->name('create-investor-profile');
    Route::post('/investor-profile', [InvestorProfileController::class, 'store'])->name('store-investor-profile');
    Route::get('/investor-profile/{id}/edit', [InvestorProfileController::class, 'edit'])->name('edit-investor-profile');
    Route::put('/investor-profile/{id}', [InvestorProfileController::class, 'update'])->name('update-investor-profile');
    Route::delete('/investor-profile', [InvestorProfileController::class, 'destroy'])->name('delete-investor-profile');






});
