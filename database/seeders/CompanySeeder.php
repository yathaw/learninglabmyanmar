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
        $j = 0;
        for ($i = 0; $i == 3; $i++) {
		    $company = new Company;
            $company->name = $faker->company;
            $company->logo = $companyLogo[$j++];
            $company->address = $faker->company;
            $company->description = $faker->company;
            $company->created_at = now();
            $company->updated_at = now();
            $company->save();

		}
    }
}
