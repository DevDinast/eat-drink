<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Routes principales
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('Bienvenue');
});

Route::get('/exposants', function () {
    return view('exposants');
});


/*
|--------------------------------------------------------------------------
| Authentification : inscription & connexion
|--------------------------------------------------------------------------
*/

// Formulaire d'inscription
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

// Formulaire de connexion
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');

// Page en attente
Route::get('/en-attente', function () {
    return view('en_attente');
})->name('en_attente');

Route::get('/demande', [AdminController::class, 'index'])->name('demande');
Route::post('/demande/{user}/valider', [AdminController::class, 'valider'])->name('admin.demande.valider');
Route::post('/demande/{user}/rejeter', [AdminController::class, 'rejeter'])->name('admin.demande.rejeter');
