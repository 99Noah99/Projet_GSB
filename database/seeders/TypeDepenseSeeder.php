<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TypeDepenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_depense')->insert([
            [
                'Id_TypeDepense' => 1,
                'Nom_TypeDepense' => 'repas midi',
                'Prix_unite' => 20.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Id_TypeDepense' => 2,
                'Nom_TypeDepense' => 'relais étape (nuit + repas)',
                'Prix_unite' => 120.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Id_TypeDepense' => 3,
                'Nom_TypeDepense' => 'nuit hotel',
                'Prix_unite' => 90.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Id_TypeDepense' => 4,
                'Nom_TypeDepense' => 'kilometre',
                'Prix_unite' => 0.20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Id_TypeDepense' => 5,
                'Nom_TypeDepense' => 'avion',
                'Prix_unite' => 0.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Id_TypeDepense' => 6,
                'Nom_TypeDepense' => 'sncf',
                'Prix_unite' => 0.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
