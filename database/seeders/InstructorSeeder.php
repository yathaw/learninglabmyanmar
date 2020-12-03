<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instructor;


class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instructor::create([
        	'headline'			=> 'Founder of Codemy',
        	'bio'			=> 'John Elder is a pioneer in Web Development who created one of the first Internet advertising networks back in 1997. He sold it to a publicly traded company at the height of the dot com boom and then went on to create the best-selling Submission-Spider search engine submission software that`s been used by over 3 million individuals and small businesses in over 45 countries.Today he teaches Web Development courses at Codemy the online code school he founded.John graduated with honors with a degree in Economics from Washington University in St. Louis where he was an ArtSci Scholar. ',
        	'website'			=> 'http://google.com/',
        	'twitter'			=> 'http://google.com/',
        	'facebook'			=> 'http://google.com/',
        	'linkedin'			=> 'http://google.com/',
        	'youtube'			=> 'http://google.com/',
        	'instagram'			=> 'http://google.com/',
        	'status'			=> 1,


        	'user_id'	=>	3
        ]);
    }
}
