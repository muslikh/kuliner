<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubDistricController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');

Route::middleware('auth')->group(function() {
    Route::get('/home', function () {
        return view('welcome');
    })->name('home');

    Route::get('/sub-district', SubDistricController::class)->name('subdistrict.index');

    Route::resource('/category', CategoryController::class);
});
