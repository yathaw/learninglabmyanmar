<?php

namespace Database\Seeders;
use App\Models\Contenttype;
use Illuminate\Database\Seeder;

class ContenttypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contenttype::create([
        	'name'=> 'lecture'
        ]);
        Contenttype::create([
        	'name'=> 'quiz'
        ]);

        Contenttype::create([
            'name'=> 'assignment'
        ]);
    }
}
