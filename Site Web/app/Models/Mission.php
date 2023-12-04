<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $table = 'mission';
    protected $primaryKey = 'Id_Mission';

    public function ville() {
        return $this->hasOne(Ville::class, 'Id_Ville', 'Id_Ville');
    }

    public function historique_statut() {                // jointure avec table historique_statut retourne tout les enregistrements
        return $this->hasMany(Historique_Statut::class, 'Id_Mission', 'Id_Mission');
    }

    public function dernier_historique_statut(){        // jointure avec historique_statut et récupère que le dernier enregistrement 
        return $this->hasOne(Historique_Statut::class, 'Id_Mission', 'Id_Mission')->latest('Date_Changement');
    }
}
