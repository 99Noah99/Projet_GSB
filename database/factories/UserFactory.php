<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use App\Models\Fonction;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nom' => fake()->name(),
            'Prenom' => fake()->name(),
            'Email' => fake()->unique()->safeEmail(),
            'username' => fake()->userName(),
            'password' => static::$password ??= Hash::make('password'),
            'Id_Fonction' => Fonction::inRandomOrder()->first()->Id_Fonction
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
