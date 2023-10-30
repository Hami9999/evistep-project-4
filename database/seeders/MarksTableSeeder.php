<?php

namespace Database\Seeders;

use App\Models\Marks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            Marks::create([
                'student_id' => 7,
                'subject_id' =>57,
                'date' => $faker->date,
                'mark' => 10,
            ]);
        }
    }
}
