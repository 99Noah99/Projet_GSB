<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mission;
use App\Models\Historique_Statut;
use Carbon\Carbon;

class ComptableController extends Controller
{
    public function show_ListeVisiteur()
    {
        $utilisateurs = User::where('Id_Fonction', 2)->get();
        return view('Comptabilite.utilisateur', ['utilisateurs' => $utilisateurs]);
    }
    
    public function show_ListeMission_ParVisiteur($id)
    {
        $tous_missions = Mission::with('ville', 'dernier_historique_statut.statut','frais')->where('Id_Utilisateur',$id)->get();
        return view('GestionFrais.show_liste_mission', [
            'missions' => $tous_missions
        ]);
    }

    public function valider_mission(){
        Historique_Statut::create([
            "Id_Mission" => request()->id,
            "Id_Statut" => 2,
            "Date_Changement" => Carbon::now()
        ]);

        return redirect()->back();
    }

    public function refuser_mission(){
        Historique_Statut::create([
            "Id_Mission" => request()->id,
            "Id_Statut" => 4,
            "Date_Changement" => Carbon::now()
        ]);

        return redirect()->back();
    }

}
