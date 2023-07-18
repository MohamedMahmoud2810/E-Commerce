<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
            'name'=> $this->faker->word,
            'image'=> $this->faker->word.'.jpg',
            'description' => $this->faker->word,
            'price' => $this->faker->numberBetween(10 , 500000),
            'discount_price' => $this->faker->numberBetween(10 , 500000),
            'category_id' => $this->faker->numberBetween(1 , 20),
            'color' => $this->faker->word,
            'size' => $this->faker->word,
        ];
    }
}
