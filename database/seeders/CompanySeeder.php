<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $companyLogo = [
            '/storage/companylogo/12345.png',
            '/storage/companylogo/24680.png',
            '/storage/companylogo/56789.png'
        ];
        // for ($i = 1; $i == 3; $i++) {

        Company::create([
            'name'         => $faker->company,
            'logo'         => $companyLogo[0],
            'address'      => $faker->address,
            'description'  => $faker->realText($maxNbChars = 200, $indexSize = 2),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Company::create([
            'name'         => $faker->company,
            'logo'         => $companyLogo[1],
            'address'      => $faker->address,
            'description'  => $faker->realText($maxNbChars = 200, $indexSize = 2),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Company::create([
            'name'         => $faker->company,
            'logo'         => $companyLogo[2],
            'address'      => $faker->address,
            'description'  => $faker->realText($maxNbChars = 200, $indexSize = 2),
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
