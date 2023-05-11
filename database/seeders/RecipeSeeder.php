<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1,20) as $recipeIndex) {
            DB::table('recipes')->insert([
                'title' => $faker->text(20),
                'description' => $faker->text(100),
                'prep_time' => $faker->numberBetween(15, 120),
                'cooking_time' => $faker->numberBetween(60, 480),
                'serving_size' => $faker->numberBetween(1,10),
                'user_id' => $faker->numberBetween(1,10),
                'category_ids' => json_encode([
                    $faker->numberBetween(1,10),
                    $faker->numberBetween(1,10)
                ]),
            ]);

            foreach (range(1,3) as $recipeIngredientIndex) {
                DB::table('recipe_ingredients')->insert([
                    'recipe_id' => $recipeIndex,
                    'ingredient_id' => $faker->numberBetween(1,10),
                    'measurement' => $faker->text(15),
                ]);
            }
        }
    }
}
