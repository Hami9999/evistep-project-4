<?php

namespace Database\Seeders;

use App\Models\Teachers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            Teachers::create([
                'first_name' => $faker->name,
                'last_name' => $faker->name,
            ]);

        }
    }
}
