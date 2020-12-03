<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
        	'name'=> 'Development'
        ]);

        Category::create([
        	'name'=> 'Business'
        ]);

        Category::create([
        	'name'=> 'Marketing'
        ]);

        Category::create([
        	'name'=> 'Language'
        ]);
    }
}
