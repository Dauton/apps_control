<?php

use App\Http\Controllers\AuthControllers\AuthController;
use App\Http\Controllers\ShowPagesControllers\PassowrdPages;
use App\Http\Controllers\ShowPagesControllers\MainPages;
use App\Http\Controllers\AppControllers\AppController;
use App\Http\Controllers\ImportsControllers\ImportExcelController;
use App\Http\Controllers\PasswordControllers\PasswordController;
use App\Http\Controllers\ServerControllers\ServerController;
use App\Http\Controllers\ShowPagesControllers\AppPages;
use App\Http\Controllers\ShowPagesControllers\ServerPages;
use App\Http\Controllers\ShowPagesControllers\UserPages;
use App\Http\Controllers\UserControllers\UserController;
use App\Http\Middleware\IsLoggedIn;
use App\Http\Middleware\NotLoggedIn;
use App\Imports\ImportApp;
use Illuminate\Support\Facades\Route;

Route::middleware([IsLoggedIn::class])->group(function() {

    // SHOW PAGES
    Route::get('/', [MainPages::class, 'loginPAGE'])->name('login');

    // LOGIN
    Route::post('/auth', [AuthController::class, 'auth'])->name('auth');

});


Route::middleware([NotLoggedIn::class])->group(function() {

    // SHOW  MAIN PAGES

        Route::get('/homepage', [MainPages::class, 'homePAGE'])->name('homepage');
        Route::get('/registrations', [MainPages::class, 'registrationsPAGE'])->name('registrations');
        Route::get('/importation', [MainPages::class, 'importationPAGE'])->name('importation');
        Route::get('/admin', [MainPages::class, 'adminPAGE'])->name('admin');
        Route::get('/logs', [MainPages::class, 'logsPAGE'])->name('logs');


    // SHOW CRUDS PAGES

        // PASSWORD
        Route::get("/password/edit/{id}", [PassowrdPages::class, 'editPasswordPAGE'])->name('edit-password');

        // USER
        Route::get('/user/edit/{id}', [UserPages::class, 'editUserPAGE'])->name('edit-user');

        // APP
        Route::get('/app/create', [AppPages::class, 'createAppPAGE'])->name('create-app');
        Route::get('/app/edit/{id}', [AppPages::class, 'editAppPAGE'])->name('edit-app');

        // SERVER
        Route::get('/server/create', [ServerPages::class, 'createServerPAGE'])->name('create-server');
        Route::get('/server/edit/{id}', [ServerPages::class, 'editServerPAGE'])->name('edit-server');


    // EXECUTES

        // PASSWORD
        Route::post('/editPassword/{id}', [PasswordController::class, 'editPassword'])->name('editPassword');

        // USER
        Route::post('/createUser', [UserController::class, 'createUser'])->name('createUser');
        Route::post('/editUser/{id}', [UserController::class, 'editUser'])->name('editUser');
        Route::get('/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');

        // APP
        Route::post('/createApp', [AppController::class, 'createApp'])->name('createApp');
        Route::post('/editApp/{id}', [AppController::class, 'editApp'])->name('editApp');
        Route::get('/deleteApp/{id}', [AppController::class, 'deleteApp'])->name('deleteApp');

        // SERVER
        Route::post('/createServer', [ServerController::class, 'createServer'])->name('createServer');
        Route::post('/editServer/{id}', [ServerController::class, 'editServer'])->name('editServer');
        Route::get('/deleteServer/{id}', [ServerController::class, 'deleteServer'])->name('deleteServer');


    // LOGOUT
        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


    // IMPORTS
        // APP
        Route::post('/importApp', [ImportExcelController::class, 'importApp'])->name('importApp');

        // SERVER
        Route::post('/importServer', [ImportExcelController::class, 'importServer'])->name('importServer');


    // DOWNLOAD
        Route::get('/download/{file}', function($file) {

            return response()->download(storage_path('app/public/' . $file));

        })->name('download');

});

