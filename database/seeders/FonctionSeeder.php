<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fonction;

class FonctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fonction::create([
            'Id_Fonction' => 1,
            'Nom_Fonction' => 'COMPTABLE'
        ]);

        Fonction::create([
            'Id_Fonction' => 2,
            'Nom_Fonction' => 'UTILISATEUR'
        ]);

        Fonction::create([
            'Id_Fonction' => 3,
            'Nom_Fonction' => 'DEVELOPPEUR'
        ]);
    }
}
