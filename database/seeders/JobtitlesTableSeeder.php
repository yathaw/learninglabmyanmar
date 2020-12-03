<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jobtitle;


class JobtitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jobtitle::create([
        	'name'=> 'Office Staff'
        ]);

        Jobtitle::create([
        	'name'=> 'HR'
        ]);

        Jobtitle::create([
        	'name'=> 'Finance'
        ]);

        Jobtitle::create([
        	'name'=> 'Developer'
        ]);

        Jobtitle::create([
        	'name'=> 'Student'
        ]);

        Jobtitle::create([
        	'name'=> 'Freelance'
        ]);
    }
}
