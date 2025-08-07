<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Review;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Product::factory(25)->create()->each(function ($product){
            $numReviews = random_int(2,10);

            Review::factory()->count($numReviews)
            ->excellent()
            ->for($product)
            ->create();
        });

        Product::factory(25)->create()->each(function ($product){
            $numReviews = random_int(2,10);

            Review::factory()->count($numReviews)
            ->good()
            ->for($product)
            ->create();
        });

        Product::factory(25)->create()->each(function ($product){
            $numReviews = random_int(2,10);

            Review::factory()->count($numReviews)
            ->average()
            ->for($product)
            ->create();
        });
        Product::factory(25)->create()->each(function ($product){
            $numReviews = random_int(2,10);

            Review::factory()->count($numReviews)
            ->bad()
            ->for($product)
            ->create();
        });

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
