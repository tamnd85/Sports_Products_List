<?php

namespace Database\Factories;


use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $reviews = [
            "Excelente raqueta, ligera y con muy buen control. Perfecta para jugadores intermedios que buscan mejorar su juego.",
            "Me gusta mucho el balance, aunque esperaba un poco más de potencia. En general, buen producto para el precio.",
            "Muy cómodas y con buena amortiguación. He notado menos fatiga en mis carreras largas.",
            "El diseño es genial, pero después de un mes el material empezó a desgastarse rápido. No las recomiendo para uso intenso.",
            "Robusta y resistente. Perfecta para senderos complicados y terrenos irregulares. Gran compra.",
            "La suspensión funciona muy bien, pero el peso es un poco alto para mí. Aún así, estoy satisfecha con la calidad.",
            "Duradera y con buen rebote. Ideal para entrenamientos diarios.",
            "Buena pelota pero perdió aire rápido. No muy recomendable si quieres que dure mucho."
        ];

        return [
            'product_id'    => null,
            'user_id'       => User::factory(),
            'review'        => $this->faker->randomElement($reviews),
            'rating'        => $this->faker->numberBetween(1, 5),
            'created_at'    => fake()->dateTimeBetween('-2 years'),
            'updated_at'    => fake()->dateTimeBetween('created_at','now')
        ];
    }

    public function excellent()
    {
        return $this->state(function(array $attributes){
            return[
                'rating' => 5
            ];
        });
    }

    public function good()
    {
        return $this->state(function(array $attributes){
            return[
                'rating' => fake ()->numberBetween(3,4)
            ];
        });
    }

    public function average()
    {
        return $this->state(function(array $attributes){
            return[
                'rating' => fake ()->numberBetween(2,4)
            ];
        });
    }

    public function bad()
    {
        return $this->state(function(array $attributes){
            return[
                'rating' => fake ()->numberBetween(1,2)
            ];
        });
    }
}
