<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mission;
use App\Models\Type_Depense;
use App\Models\Frais;
use Illuminate\Support\Facades\Storage;

class GestionFraisController extends Controller
{
    public function show_create_frais($id_mission){
        $tous_type_depense = Type_Depense::all();
        return view('GestionFrais.ajout_frais', [
            "types_depenses" => $tous_type_depense,
            "id_mission" => $id_mission
        ]);
    }

    public function create_frais(Request $request){
        $ligne_typedepense = Type_Depense::find(request()->select_TypeDepense);
        if (request()->select_TypeDepense != 5 && request()->select_TypeDepense != 6){ //vérifie si le type de dépense est pas avion et sncf
            $prix_total = (request()->Quantite) * $ligne_typedepense->Prix_unite; 
        }
        else{
            $prix_total = request()->Montant;
        }
        
        // Traitement du fichier
        request()->validate([
            'fichier' => 'required|mimes:pdf,doc,docx', // Ajoutez les extensions autorisées, permet de vérifier si le fichier est "valide"
        ]);
        $file = request()->fichier;
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $filePath = $file->store('/', 'Justificatifs_Frais'); // on store le fichier dans le disk Justificatifs_Frais (voir config/filesystemes.php) avec un nom aléatoire unique
        $randomName= pathinfo($filePath, PATHINFO_FILENAME);

        Frais::create([
            "Demandeur" => auth()->user()->Id_Utilisateur,
            "Intitule" => request()->Intitule,
            "Prix_Total" => $prix_total,
            "Date_Depense" => request()->Date_Depense,
            "Id_Mission" => request()->id_mission,
            "Id_TypeDepense" => request()->select_TypeDepense,
            "NomBase_Justificatif" => $originalName,
            "NouveauNom_Justificatif" => $randomName ,
            "Extensions" => $extension,
            "Chemin" => $filePath,          
        ]);
        return redirect()->route('GestionFrais.show_mission',['id' => request()->id_mission]);
    }


    public function delete_frais($id){
        $frais = Frais::find($id);
        Storage::disk('Justificatifs_Frais')->delete($frais->Chemin);  //fichier stocker sur le disque Justificatifs_Frais de laravel (voir config/filesystemes.php)
        $frais->delete();
        return redirect()->back();
    }


    public function donwload_document($id){
        $frais = Frais::find($id);
        return Storage::disk('Justificatifs_Frais')->download($frais->Chemin, $frais->NomBase_Justificatif);
    }

}



 