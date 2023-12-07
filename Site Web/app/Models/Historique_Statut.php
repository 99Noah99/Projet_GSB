<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique_Statut extends Model
{
    use HasFactory;


    protected $table = 'historique_statut';
    protected $primaryKey = 'Id_Historique';
    protected $guarded = [];


    public function statut() {
        return $this->hasOne(Statut::class, 'Id_Statut', 'Id_Statut');
    }
}
