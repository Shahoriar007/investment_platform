<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bussiness\BussinessCategoryController;


Route::middleware(['auth'])->group(function () {

    // bussiness category resource route
    Route::get('/bussiness-category', [BussinessCategoryController::class, 'index'])->name('bussiness-category');
    Route::post('/bussiness-category', [BussinessCategoryController::class, 'store'])->name('create-bussiness-category');
    Route::get('/bussiness-category/{id}/edit', [BussinessCategoryController::class, 'edit'])->name('edit-bussiness-category');
    Route::put('/bussiness-category/{id}', [BussinessCategoryController::class, 'update'])->name('update-bussiness-category');
    Route::delete('/bussiness-category', [BussinessCategoryController::class, 'destroy'])->name('delete-bussiness-category');






});
