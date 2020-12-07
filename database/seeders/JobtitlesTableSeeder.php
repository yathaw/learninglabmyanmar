<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jobtitle;
use Faker;

class JobtitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i <= 10; $i++) {
            Jobtitle::create([
            	'name'         => $faker->jobTitle,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
