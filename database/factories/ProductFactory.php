<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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

        $descriptions = [
        'Durable and lightweight, perfect for intense training sessions.',
        'Designed for professional athletes and beginners alike.',
        'High-quality materials ensure comfort and performance.',
        'Ideal for competitive matches and regular practice.',
        'Provides excellent grip and long-lasting durability.',
        'Perfect balance between style, comfort, and utility.',
        'Engineered for maximum performance on the field.',
        'Reliable and sturdy, built for everyday sports use.',
        'Comfortable design to enhance your athletic experience.',
        'A must-have for every sports enthusiast.',
    ];

        return [
            'name'          => $this->faker->randomElement($sportsProducts),
            'description'   => $this->faker->randomElement($descriptions),
            'stock'         => $this->faker->numberBetween(0,100),
            'price'         => $this->faker->randomFloat(2,10,500),
            'image' => "https://picsum.photos/seed/" . Str::random(10) . "/400/300",
        ];
    }
}
