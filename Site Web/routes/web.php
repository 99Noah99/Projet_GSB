<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\GestionFraisController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [ConnexionController::class, 'show_login'])->name('login');

Route::post('/make-login', [ConnexionController::class, 'connexion'])->name('submit_login');

Route::middleware('auth')->group(function () {

    Route::get('/gestion', function () {
        return view('gestion');
    })->name('gestion');

    Route::get('/deconnexion', [ConnexionController::class, 'SeDeconnecter'])->name('Deconnexion');

    // ---------------------------- GESTION DE FRAIS

    Route::get('/frais/liste', [GestionFraisController::class, 'show_ListeFrais'])->name('GestionFrais.ListeFrais');


    // ---------------------------- GESTION DE FRAIS

});
