<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProduitsController;
use App\Http\Controllers\StandController;
use App\Http\Controllers\CommandeController;


/*
|--------------------------------------------------------------------------
| Pages publiques
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => view('welcome'));

Route::get('/index', fn () => view('Bienvenue'))->name('index');

Route::get('/exposants', function () {
    return view('exposants');
});


/*
|--------------------------------------------------------------------------
| Authentification
|--------------------------------------------------------------------------
*/

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.store');

/*
|--------------------------------------------------------------------------
| Tableau de bord
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', fn () => view('dashboard_Entrepreneure'))->name('dashboard_Entrepreneure');

/*
|--------------------------------------------------------------------------
| Gestion des demandes
|--------------------------------------------------------------------------
*/

Route::get('/demande', [AdminController::class, 'index'])->name('demande');
Route::post('/demande/{user}/valider', [AdminController::class, 'valider'])->name('admin.demande.valider');
Route::post('/demande/{user}/rejeter', [AdminController::class, 'rejeter'])->name('admin.demande.rejeter');

/*
|--------------------------------------------------------------------------
| Produits
|--------------------------------------------------------------------------
*/

Route::get('/entrepreneur_produits', [ProduitsController::class, 'index'])->name('entrepreneur_produits');
Route::get('/entrepreneure_create', [ProduitsController::class, 'create'])->name('entrepreneure_create');
Route::post('/entrepreneur_produits', [ProduitsController::class, 'store'])->name('entrepreneur_store');
Route::get('/entrepreneure_edit/{id}', [ProduitsController::class, 'edit'])->name('entrepreneure_edit');
Route::put('/entrepreneur_update/{id}', [ProduitsController::class, 'update'])->name('entrepreneur_update');
Route::delete('/entrepreneur_destroy/{id}', [ProduitsController::class, 'destroy'])->name('entrepreneur_destroy');

/*
|--------------------------------------------------------------------------
| Stands
|--------------------------------------------------------------------------
*/

Route::get('/stand_create', [StandController::class, 'create'])->name('stand_create');
Route::post('/entrepreneur_stand', [StandController::class, 'store'])->name('stand_store');
Route::get('/stand_edit', [StandController::class, 'edit'])->name('stand_edit');
Route::put('/stand_update', [StandController::class, 'update'])->name('stand_update');
Route::delete('/stand_delete', [StandController::class, 'destroy'])->name('stand_delete');

/*
|--------------------------------------------------------------------------
| Produits publics / commandes
|--------------------------------------------------------------------------
*/

// Voir les produits d'un stand
Route::get('/stand/{id}/produits', [ProduitsController::class, 'voirProduits'])->name('stand_produits');

// Formulaire pour passer une commande
Route::get('/stand/{id}/commande', [CommandeController::class, 'create'])->name('commande.create');

// Enregistrement de la commande
Route::post('/stand/{id}/commande', [CommandeController::class, 'store'])->name('commande.store');
