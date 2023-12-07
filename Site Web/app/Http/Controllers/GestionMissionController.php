<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Historique_Statut;
use App\Models\Ville;
use Carbon\Carbon;

class GestionMissionController extends Controller
{
    public function show_create_mission()
    {
        return view('GestionFrais.ajout_mission');
    }

    public function show_mission($id)
    {
        $mission = Mission::where('Id_Mission',$id)->where('Id_Utilisateur',auth()->user()->Id_Utilisateur)->first();
        return view('GestionFrais.show_mission', [
            'mission' => $mission
        ]);
    
    }

    public function create_mission()
    {
        $create_mission = Mission::create([
            'Nom_Mission' => request()->Nom_Mission,
            'Date_Debut' => request()->Date_Debut,
            'Date_Fin' => request()->Date_Fin,
            'Id_Utilisateur' => auth()->user()->Id_Utilisateur,
            'Id_Ville'=> request()->Ville
        ]);
        
        Historique_Statut::create([
            "Id_Mission" => $create_mission->Id_Mission,
            "Id_Statut" => 3,
            "Date_Changement" => Carbon::now()
        ]);

        return redirect()->route('GestionFrais.show_mission',['id' => $create_mission->Id_Mission]);
    }

    public function recherche_ville(){
        $query = request()->q;
        $recherche = Ville::where('Nom_Ville', 'LIKE', '%' . $query . '%')->limit(5)->get();
        $result = [];
        $result['results'] = [];
        
        foreach($recherche as $ville){
            $result['results'][] = [
                'id' => $ville->Id_Ville,
                'text' => $ville->Nom_Ville
            ];
        }

        return json_encode($result);
    }

    public function declare_mission(){
        Historique_Statut::create([
            "Id_Mission" => request()->id,
            "Id_Statut" => 1,
            "Date_Changement" => Carbon::now()
        ]);

        return redirect()->route('GestionFrais.ListeFrais');
    }

    public function delete_mission($id){
        $historiques_statut = Historique_Statut::where('Id_Mission',$id)->get();
        foreach($historiques_statut as $historique_statut){
            $historique_statut->delete();
        }
        Mission::where('Id_Mission',$id)->forceDelete();

        return redirect()->back();
    }
    
    
}