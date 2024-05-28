<?php

namespace Database\Factories;

use App\Models\Historique_Statut;
use App\Models\Mission;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class Historique_StatutFactory extends Factory
{
    protected $model = Historique_Statut::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Id_Mission' => Mission::factory(), // Generates a new Mission instance
            'Id_Statut' => 3,   // Statut en attente de déclaration par défaut
            'Date_Changement' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
