<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	level::create([
        	'name'=> 'Beginner Level'
        ]);
        level::create([
        	'name'=> 'Intermediate Level'
        ]);
        level::create([
        	'name'=> 'Expert Level'
        ]);
        level::create([
        	'name'=> 'All Levels'
        ]);
        
    }
}
