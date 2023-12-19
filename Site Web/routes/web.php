<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnexionController;
use App\Http\Controllers\GestionFraisController;
use App\Http\Controllers\GestionMissionController;
use App\Http\Middleware\VerifierSiComptable;

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


    // ---------------------------- CONNEXION

Route::get('/login', [ConnexionController::class, 'show_login'])->name('login');
Route::post('/make-login', [ConnexionController::class, 'connexion'])->name('submit_login');
Route::get('/Create/account',[ConnexionController::class,'show_create_account'])->name('show_create_account');
Route::post('/Create/account',[ConnexionController::class, 'create_account'])->name('create_account');



//Route protéger par auth (session)
Route::middleware('auth')->group(function () {

    Route::get('/accueil', 
    function () {
        return view('accueil');
    })->name('accueil');

    Route::get('/deconnexion', [ConnexionController::class, 'SeDeconnecter'])->name('Deconnexion');

    // ---------------------------- GESTION DE FRAIS

    Route::get('/mission/liste', [GestionMissionController::class, 'show_ListeMission'])->name('GestionFrais.ListeMission');
    Route::get('/mission/create', [GestionMissionController::class, 'show_create_mission'])->name('GestionFrais.show_create_mission');
    Route::post('/mission/create',[GestionMissionController::class, 'create_mission'])->name('GestionFrais.create_mission');
    Route::get('/mission/recherche/ville/', [GestionMissionController::class, 'recherche_ville'])->name('GestionFrais.recherche_ville');
    Route::get('/mission/{id}', [GestionMissionController::class, 'show_mission'])->name('GestionFrais.show_mission')->where('id', '[0-9]+');
    Route::get('/mission/delete/{id}', [GestionMissionController::class, 'delete_mission'])->name('GestionFrais.delete_mission')->where('id', '[0-9]+');
    Route::post('/mission/declare',[GestionMissionController::class, 'declare_mission'])->name('GestionFrais.declare_mission');
    Route::get('/mission/create/frais/{id_mission}',[GestionFraisController::class, 'show_create_frais'])->name('GestionFrais.show_create_frais');
    Route::post('/mission/create/frais',[GestionFraisController::class, 'create_frais'])->name('GestionFrais.create_frais');
    Route::get('/mission/delete/frais/{id}',[GestionFraisController::class, 'delete_frais'])->name('GestionFrais.delete_frais');
    Route::get('/mission/frais/document/download/{id}',[GestionFraisController::class, 'donwload_document'])->name('GestionFrais.donwload_document');
    
    // Route::get('/visiteur/list', [GestionMissionController::class, 'show_ListeVisiteur'])->name('GestionFrais.show_ListeVisiteur');
    // Route::get('/mission/liste/{id}', [GestionMissionController::class, 'show_ListeMission_ParVisiteur'])->name('GestionFrais.show_ListeMission_ParVisiteur')->middleware(VerifierSiComptable::class);
});
