<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Review;
use App\Models\Reply;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create an admin user
        $admin = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'is_admin' => true,
            'password' => bcrypt('password'),
        ]);

        // Create 25 normal users
        $users = User::factory(25)->create();

        // Create 100 products
        $products = Product::factory(100)->create();

        // For each product, create between 2 and 10 reviews
        $products->each(function ($product) use ($users, $admin) {
            $numReviews = random_int(2, 10);

            for ($i = 0; $i < $numReviews; $i++) {
                // Randomly select a rating scope: excellent, good, average, or bad
                $ratingScope = collect(['excellent', 'good', 'average', 'bad'])->random();

                // Create a review using the chosen scope
                $review = Review::factory()
                    ->$ratingScope() // apply the scope BEFORE creating
                    ->state(function () use ($users, $product) {
                        return [
                            'user_id' => $users->random()->id,  // assign a random user
                            'product_id' => $product->id,       // assign the current product
                        ];
                    })
                    ->create();

                // Optionally create a reply from the admin for some reviews
                if (rand(0, 1)) { // 50% chance
                    Reply::factory()->create([
                        'review_id' => $review->id,
                        'author' => $admin->name,             // only admin can reply
                        'content' => 'This is an example reply', // example reply text
                    ]);
                }
            }
        });
    }
}
