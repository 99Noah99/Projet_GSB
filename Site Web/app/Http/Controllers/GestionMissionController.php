<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Historique_Statut;
use App\Models\Ville;
use App\Models\Frais;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class GestionMissionController extends Controller
{
    public function show_ListeMission() {
        $tous_missions = Mission::with('ville', 'dernier_historique_statut.statut','frais')->where('Id_Utilisateur',auth()->user()->Id_Utilisateur)->orderBy('created_at', 'DESC')->get();
        return view('GestionFrais.show_liste_mission', [
            'missions' => $tous_missions
        ]);
    }



    public static function badge($statut) {
        switch ($statut){
            case 1 :
                $badge = '<span class="badge rounded-pill bg-warning" style="font-size:12px">En attente de validation</span>';
                break;
            case 2 :
                $badge = '<span class="badge bg-success" style="font-size:12px">Validée</span>';
                break;
            case 3 :
                $badge = '<span class="badge bg-dark" style="font-size:12px">En attente de déclaration</span>';
                break;

            case 4 :
                $badge = '<span class="badge bg-danger" style="font-size:12px">Refusée</span>';
                break;
        }

        return $badge;
    }


    public function show_create_mission()
    {
        return view('GestionFrais.ajout_mission');
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
            "Id_Statut" => 3, //en attente de déclaration
            "Date_Changement" => Carbon::now()
        ]);
        return redirect()->route('GestionFrais.show_mission',['id' => $create_mission->Id_Mission]);
    }


    public function show_mission($id)
    {   

        $frais = Frais::where('Id_Mission',$id)->get();
        $mission = Mission::find($id); // find() permet de rechercher un seul élément par sa clé primaire ici Id_Mission et de le retourner
        return view('GestionFrais.show_mission', [
            'mission' => $mission,
            'frais' =>$frais
        ]);
    
    }


    public function recherche_ville(){
        $query = request()->q;
        $recherche = Ville::where('Nom_Ville', 'LIKE', '%' . $query . '%')
                            ->orWhere('Nom_Ville', 'LIKE', '%'.$query.'%')
                            ->orderByRaw("CASE WHEN Nom_Ville = ? THEN 1 WHEN Nom_Ville LIKE ? THEN 2 ELSE 3 END", [$query, $query.'%'])
                            ->limit(5)->get();
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

        return redirect()->route('GestionFrais.ListeMission');
    }


    public function delete_mission($id){
        //suppression des statuts liés à la mission
        $historiques_statut = Historique_Statut::where('Id_Mission',$id)->get();
        foreach($historiques_statut as $historique_statut){
            $historique_statut->delete();
        }

        //suppression des frais lié à la mission
        $frais_missions = Frais::where('Id_Mission',$id)->get();
        foreach($frais_missions as $frais_mission){
            Storage::disk('Justificatifs_Frais')->delete($frais_mission->Chemin); // supprime le fichier du disk Justificatifs_Frais de laravel (voir config/filesystemes.php)
            $frais_mission->delete();
        }

        Mission::where('Id_Mission',$id)->forceDelete();

        return redirect()->back();
    }
    
    
}