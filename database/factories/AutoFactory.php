<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Auto>
 */

class AutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'marca' => $this->faker->randomElement($array = array ('Toyota','Ford','Chevrolet','Honda','BMW','Kia','Fiat')),
            'modelo' => $this->faker->randomElement($array = array ('Punto','Camaro','Civic','M3','Fiesta','Picanto','Corolla')),
            'color' => $this->faker->randomElement($array = array ('Blanco', 'Negro', 'Rojo', 'Verde', 'Azul', 'Amarillo')),
            'puertas' => $this->faker->randomElement($array = array ('2', '4')),
            'cilindrado' => $this->faker->randomElement($array = array ('1000 cc','1500 cc','2000 cc','2500 cc','3000 cc')),
            'automatico' => $this->faker->randomElement($array = array ('Si', 'No')),
            'electrico' => $this->faker->randomElement($array = array ('Si', 'No'))
        ];
    }
}
