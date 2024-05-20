<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frais extends Model
{
    use HasFactory;

    protected $table = 'frais';
    protected $primaryKey = 'Id_Frais';
    protected $guarded = []; // Ne proège aucune colonne, permet le create

    public function type_depense() {
        return $this->hasOne(Type_Depense ::class, 'Id_TypeDepense', 'Id_TypeDepense');
    }
}
