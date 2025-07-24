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
    public function definition(): array
    {
        $sportsProducts =[
        'Soccer Ball',
        'Tennis Racket',
        'Running Shoes',
        'Baseball Glove',
        'Basketball Jersey',
        'Yoga Mat',
        'Swimming Goggles',
        'Cycling Helmet',
        'Dumbbell Set',
        'Boxing Gloves'

        ];

        return [
            'name'          => $this->faker->randomElement($sportsProducts),
            'description'   => $this->faker->sentence(),
            'stock'         => $this->faker->numberBetween(0,100),
            'price'         => $this->faker->randomFloat(2,10,500),
        ];
    }
}
