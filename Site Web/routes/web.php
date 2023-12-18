<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\GestionFraisController;
use App\Http\Controllers\GestionMissionController;

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




Route::get('/login', [ConnexionController::class, 'show_login'])->name('login');

Route::post('/make-login', [ConnexionController::class, 'connexion'])->name('submit_login');


//Route protéger par auth (session)
Route::middleware('auth')->group(function () {

    Route::get('/gestion', function () {
        return view('gestion');
    })->name('gestion');

    Route::get('/deconnexion', [ConnexionController::class, 'SeDeconnecter'])->name('Deconnexion');

    // ---------------------------- GESTION DE FRAIS

    Route::get('/frais/liste', [GestionMissionController::class, 'show_ListeMission'])->name('GestionFrais.ListeMission');

    Route::get('/mission/create', [GestionMissionController::class, 'show_create_mission'])->name('GestionFrais.show_create_mission');
    Route::post('/mission/create',[GestionMissionController::class, 'create_mission'])->name('GestionFrais.create_mission');
    Route::get('/mission/recherche/ville/', [GestionMissionController::class, 'recherche_ville'])->name('GestionFrais.recherche_ville');
    Route::get('/mission/{id}', [GestionMissionController::class, 'show_mission'])->name('GestionFrais.show_mission')->where('id', '[0-9]+');
    Route::get('/mission/delete/{id}', [GestionMissionController::class, 'delete_mission'])->name('GestionFrais.delete_mission')->where('id', '[0-9]+');
    Route::post('/mission/declare',[GestionMissionController::class, 'declare_mission'])->name('GestionFrais.declare_mission');
    Route::get('/mission/create/frais/{id_mission}',[GestionFraisController::class, 'show_create_frais'])->name('GestionFrais.show_create_frais');
    Route::post('/mission/create/frais',[GestionFraisController::class, 'create_frais'])->name('GestionFrais.create_frais');
    Route::get('/mission/delete/frais/{id}',[GestionFraisController::class, 'delete_frais'])->name('GestionFrais.delete_frais');
    

});
