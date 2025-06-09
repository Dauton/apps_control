<?php

use App\Http\Controllers\AuthControllers\AuthController;
use App\Http\Controllers\ShowPagesController;
use App\Http\Controllers\AppControllers\AppController;
use App\Http\Middleware\EstaLogado;
use App\Http\Middleware\NaoEstaLogado;
use Illuminate\Support\Facades\Route;

Route::middleware([EstaLogado::class])->group(function() {
    // SHOW PAGES
    Route::get('admin/login', [ShowPagesController::class, 'adminLoginPAGE'])->name('login');

    // LOGIN
    Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
});


Route::middleware([NaoEstaLogado::class])->group(function() {
    // SHOW PAGES
    Route::get('admin/homepage', [ShowPagesController::class, 'adminHomePAGE'])->name('homepage');
    Route::get('/admin/acessos', [ShowPagesController::class, 'adminAcessosPAGE'])->name('acessos');

    // EXECUTES
    Route::post('/createApp', [AppController::class, 'createApp'])->name('createApp');

    // LOGOUT
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
    
