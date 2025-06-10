<?php

use App\Http\Controllers\AuthControllers\AuthController;
use App\Http\Controllers\ShowPagesControllers\PassowrdController;
use App\Http\Controllers\ShowPagesControllers\MainPagesController;
use App\Http\Controllers\AppControllers\AppController;
use App\Http\Controllers\PasswordControllers\PasswordController;
use App\Http\Middleware\IsLoggedIn;
use App\Http\Middleware\NotLoggedIn;
use Illuminate\Support\Facades\Route;

Route::middleware([IsLoggedIn::class])->group(function() {

    // SHOW PAGES
    Route::get('/login', [MainPagesController::class, 'loginPAGE'])->name('login');

    // LOGIN
    Route::post('/auth', [AuthController::class, 'auth'])->name('auth');

});


Route::middleware([NotLoggedIn::class])->group(function() {

    // SHOW PAGES
    Route::get('/homepage', [MainPagesController::class, 'homePAGE'])->name('homepage');
    Route::get('/registrations', [MainPagesController::class, 'registrationsPAGE'])->name('registrations');
    Route::get('/admin', [MainPagesController::class, 'adminPAGE'])->name('admin');

    // SHOW CRUDS PAGES
    Route::get("/password/edit/{id}", [PassowrdController::class, 'editPasswordPAGE'])->name('edit-password');

    // EXECUTES
    Route::post('/createApp', [AppController::class, 'createApp'])->name('createApp');
    Route::post('/editPassword/{id}', [PasswordController::class, 'editPassword'])->name('editPassword');

    // LOGOUT
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});
    
