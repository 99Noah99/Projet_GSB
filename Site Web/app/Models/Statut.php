<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statut extends Model
{
    use HasFactory;

    protected $table = 'statut';
    protected $primaryKey = 'Id_Statut';


    public function parent_historique_statut()
    {
        return $this->belongsTo(Historique_Statut::class, 'Id_Statut', 'Id_Statut');
    }

}
