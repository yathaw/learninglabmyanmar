<?php

namespace Database\Seeders;
use App\Models\Sectiontype;

use Illuminate\Database\Seeder;

class SectiontypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sectiontype::create([
        	'name'=> 'lecture'
        ]);
         Sectiontype::create([
        	'name'=> 'quiz'
        ]);
          Sectiontype::create([
        	'name'=> 'assignment'
        ]);
    }
}
