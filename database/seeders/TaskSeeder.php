<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();


        for ($i = 0; $i < 5; $i++) {
            DB::table('tasks')->insert([
                'name' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'status' => true, // Default status is 'open' (true)
                'end_date' => $faker->dateTimeBetween('now', '+1 month'), // End date within the next month
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
