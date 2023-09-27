<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);

        if ($gender == "male") {
            $genere = "Uomo";
        }
        else $genere = "donna";

        return [
            'id' => $this->faker->unique()->numberBetween(3, 5000),
            'nome' => $this->faker->firstName($gender),
            'cognome'=> $this->faker->lastName(),
            'email' => $this->faker->unique()->email(),
            'genere' => $genere,
            'telefono' => $this->faker->unique()->phoneNumber(),
            'dataNascita' => date('Y-m-d'),
            'foto' => "storage/avatar.png",
        ];
    }
}
