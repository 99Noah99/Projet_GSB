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
        $tab_infos_users = [];
        $utilisateurs = User::where('Id_Fonction', 2)->get(); //2 = fontion utilisateur
        foreach($utilisateurs as $utilisateur){
            $nb_mission = Mission::with('dernier_historique_statut')
            ->where('Id_Utilisateur', $utilisateur->Id_Utilisateur)
            ->whereHas('dernier_historique_statut', function ($sql) {
                $sql->where('Id_Statut', '!=', 3); //pas égale au statut En attente de déclaration
             }) 
            ->count();
            array_push($tab_infos_users, [$utilisateur,$nb_mission]);

        }
        return view('Comptabilite.utilisateur', ['tab_infos_users' => $tab_infos_users]);
    }

    // public function Nombre_mission($id_utilisateur)
    // {
    //     Mission::where('Id_Utilisateur', $utilisateur->Id_Utilisateur)->count();
    //     return ;
    // }
    
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
