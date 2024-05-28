<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatutTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('statut')->delete();
        
        \DB::table('statut')->insert(array (
            0 => 
            array (
                'Id_Statut' => 1,
                'Valeur_Statut' => 'En attente de validation ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'Id_Statut' => 2,
                'Valeur_Statut' => 'Validée',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'Id_Statut' => 3,
                'Valeur_Statut' => 'En attente de déclaration',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'Id_Statut' => 4,
                'Valeur_Statut' => 'Refusée',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}