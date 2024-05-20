<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('admin-home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
});

Route::group(['middleware' => ['auth', 'customer']], function () {
    Route::get('customer-users', [App\Http\Controllers\HomeController::class, 'customerUsers'])->name('customer.users');
    
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('assets', [App\Http\Controllers\HomeController::class, 'assets'])->name('assets');
});