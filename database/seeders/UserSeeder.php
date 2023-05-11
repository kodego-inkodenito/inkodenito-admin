<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach(range(1,10) as $userIndex) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'username' => $faker->username,
                'email' => $faker->email,
                'password' => bcrypt('qwe123456')
            ]);
        }
    }
}
