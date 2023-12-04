<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;

class GestionFraisController extends Controller
{
    public function show_ListeFrais() {
        \DB::enableQueryLog();

        $tous_missions = Mission::with('ville', 'dernier_historique_statut.statut')->get();
        // dd(\DB::getQueryLog());
        // dd($tous_missions->toSql());
        // dd($tous_missions);
        return view('GestionFrais.show_liste_frais', [
            'missions' => $tous_missions
        ]);
    }

    public static function badge($statut) {
        switch ($statut){
            case 1 :
                $badge = '<span class="badge rounded-pill bg-warning style="font-size:12px">En attente de validation</span>';
                break;
            case 2 :
                $badge = '<span class="badge bg-success" style="font-size:12px">Validée</span>';
                break;    
        }

        return $badge;
    }
}



