<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarouselImageController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('carousel', CarouselImageController::class);
});
Route::get('/', [App\Http\Controllers\Controller::class, 'showWelcome'])->name('welcome');
