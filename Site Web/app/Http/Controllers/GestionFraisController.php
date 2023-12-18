<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Type_Depense;
use App\Models\Frais;

class GestionFraisController extends Controller
{
    public function show_create_frais($id_mission){
        $tous_type_depense = Type_Depense::all();
        return view('GestionFrais.ajout_frais', [
            "types_depenses" => $tous_type_depense,
            "id_mission" => $id_mission
        ]);
    }

    public function create_frais(){
        $ligne_typedepense = Type_Depense::find(request()->select_TypeDepense);
        if (request()->select_TypeDepense != 5 && request()->select_TypeDepense != 6){ //vérifie si le type de dépense est pas avion et sncf
            $prix_total = (request()->Quantite) * $ligne_typedepense->Prix_unite; 
        }
        else{
            $prix_total = request()->Montant;
        }
        Frais::create([
            "Demandeur" => auth()->user()->Id_Utilisateur,
            "Intitule" => request()->Intitule,
            "Prix_Total" => $prix_total,
            "Date_Depense" => request()->Date_Depense,
            "Id_Mission" => request()->id_mission,
            "Id_TypeDepense" => request()->select_TypeDepense            
        ]);
        return redirect()->route('GestionFrais.show_mission',['id' => request()->id_mission]);
    }


    public function delete_frais($id){
        $frais = Frais::find($id);
        $frais->delete();
        return redirect()->back();
    }

    
    //Exemple pour gérer la fermuture ajout frais le 20 du mois.
    // create(){
    //     $mission_month = Carbon::($mission->created_at)->month;
    //     $month_now = Carbon::now()->month;

    //     if($month_now != $mission_month && Carbon::now()->day > 20){
    //         return false;
    //     }
    // }
}



 