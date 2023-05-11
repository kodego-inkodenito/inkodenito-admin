<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1,20) as $reviewIndex) {
            DB::table('reviews')->insert([
                'rating' => $faker->numberBetween(1,5),
                'comment' => $faker->text(100),
                'user_id' => $faker->numberBetween(1,10),
                'recipe_id' => $faker->numberBetween(1,20),
            ]);
        }
    }
}
