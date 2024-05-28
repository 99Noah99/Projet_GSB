<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mission;
use App\Models\User;
use App\Models\Ville;
use Carbon\Carbon;

class MissionFactory extends Factory
{
    protected $model = Mission::class;

    public function definition()
    {
        return [
            'Nom_Mission' => $this->faker->sentence(3),
            'Date_Debut' => Carbon::parse($this->faker->dateTimeBetween('-1 year', 'now')),
            'Date_Fin' => Carbon::parse($this->faker->dateTimeBetween('now', '+1 year')),
            'Id_Utilisateur' => User::factory(),
            'Id_Ville' => Ville::inRandomOrder()->first()->Id_Ville,
            'Id_Comptable' => null
        ];
    }
}
