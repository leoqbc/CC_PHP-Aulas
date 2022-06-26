<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nome' => $this->faker->name(),
            'descricao' => $this->faker->sentence(),
            'valor' => $this->faker->randomFloat(2, 20, 500)
        ];
    }
}
