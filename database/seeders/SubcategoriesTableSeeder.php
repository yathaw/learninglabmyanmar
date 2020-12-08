<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subcategory;

class SubcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategory::create([
        	'name'			=> 'PHP Web Development',
        	'category_id'	=>	1
        ]);

        Subcategory::create([
        	'name'			=> 'Mobile Development',
        	'category_id'	=>	1
        ]);

        Subcategory::create([
        	'name'			=> 'Programming Fundamental',
        	'category_id'	=>	1
        ]);

        Subcategory::create([
        	'name'			=> 'Java Basic',
        	'category_id'	=>	1
        ]);

        Subcategory::create([
        	'name'			=> 'Business Management',
        	'category_id'	=>	2
        ]);

        Subcategory::create([
        	'name'			=> 'Operations Management',
        	'category_id'	=>	2
        ]);

        Subcategory::create([
        	'name'			=> 'Event Management',
        	'category_id'	=>	2
        ]);

        Subcategory::create([
        	'name'			=> 'Warehouse Management',
        	'category_id'	=>	2
        ]);

        Subcategory::create([
        	'name'			=> 'Digital Marketing',
        	'category_id'	=>	3
        ]);

        Subcategory::create([
        	'name'			=> 'Social Media Marketing',
        	'category_id'	=>	3
        ]);

        Subcategory::create([
        	'name'			=> 'Marketing Fundamental',
        	'category_id'	=>	3
        ]);

        Subcategory::create([
        	'name'			=> 'Branding',
        	'category_id'	=>	3
        ]);

        Subcategory::create([
        	'name'			=> 'English',
        	'category_id'	=>	4
        ]);

        Subcategory::create([
        	'name'			=> 'Japan',
        	'category_id'	=>	4
        ]);

        Subcategory::create([
        	'name'			=> 'Chinese',
        	'category_id'	=>	4
        ]);

        Subcategory::create([
        	'name'			=> 'Thailand',
        	'category_id'	=>	4
        ]);
    }

}
