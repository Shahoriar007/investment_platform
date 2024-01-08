<?php

use App\Http\Controllers\Bussiness\BussinessProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bussiness\BussinessCategoryController;


Route::middleware(['auth'])->group(function () {

    // bussiness category resource route
    Route::get('/bussiness-category', [BussinessCategoryController::class, 'index'])->name('bussiness-category');
    Route::post('/bussiness-category', [BussinessCategoryController::class, 'store'])->name('create-bussiness-category');
    Route::get('/bussiness-category/{id}/edit', [BussinessCategoryController::class, 'edit'])->name('edit-bussiness-category');
    Route::put('/bussiness-category/{id}', [BussinessCategoryController::class, 'update'])->name('update-bussiness-category');
    Route::delete('/bussiness-category', [BussinessCategoryController::class, 'destroy'])->name('delete-bussiness-category');

    // bussiness profile resource route
    Route::get('/bussiness-profile', [BussinessProfileController::class, 'index'])->name('bussiness-profile');
    Route::get('/bussiness-profile/create', [BussinessProfileController::class, 'create'])->name('create-bussiness-profile');
    Route::post('/bussiness-profile', [BussinessProfileController::class, 'store'])->name('store-bussiness-profile');
    Route::get('/bussiness-profile/{id}/edit', [BussinessProfileController::class, 'edit'])->name('edit-bussiness-profile');
    Route::put('/bussiness-profile/{id}', [BussinessProfileController::class, 'update'])->name('update-bussiness-profile');
    Route::delete('/bussiness-profile', [BussinessProfileController::class, 'destroy'])->name('delete-bussiness-profile');






});
