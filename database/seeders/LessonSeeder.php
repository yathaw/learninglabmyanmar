<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;

use Faker;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = \Faker\Factory::create();

    	$lessonLists = [
    		array('/storage/lesson/lesson1.MP4', 'MP4','/storage/lesson/lesson1.MP4'),
    		array('/storage/lesson/lesson2.MP4', 'MP4','/storage/lesson/lesson2.MP4'),
    		array('/storage/lesson/lesson3.MP4', 'MP4','/storage/lesson/lesson3.MP4'),
    		array('/storage/lesson/lesson4.MP4', 'MP4','/storage/lesson/lesson4.MP4'),
    		array('/storage/lesson/lesson5.MP4', 'MP4','/storage/lesson/lesson5.MP4'),
    		array('/storage/lesson/lesson6.MP4', 'MP4','/storage/lesson/lesson6.MP4'),
    		array('/storage/lesson/lesson7.MP4', 'MP4','/storage/lesson/lesson7.MP4'),
    		array('/storage/lesson/lesson8.MP4', 'MP4','/storage/lesson/lesson8.MP4'),
    		array('/storage/lesson/lesson9.MP4', 'MP4','/storage/lesson/lesson9.MP4'),
    		array('/storage/lesson/lesson10.MP4', 'MP4','/storage/lesson/lesson10.MP4'),
    		array('/storage/lesson/lesson11.MP4', 'MP4','/storage/lesson/lesson11.MP4'),
    		array('/storage/lesson/lesson12.MP4', 'MP4','/storage/lesson/lesson12.MP4'),
    		array('/storage/lesson/lesson13.MP4', 'MP4','/storage/lesson/lesson13.MP4'),
    		array('/storage/lesson/lesson14.MP4', 'MP4','/storage/lesson/lesson14.MP4'),
    		array('/storage/lesson/lesson15.MP4', 'MP4','/storage/lesson/lesson15.MP4'),
    		array('/storage/lesson/lesson16.MP4', 'MP4','/storage/lesson/lesson16.MP4'),
    		array('/storage/lesson/lesson17.MP4', 'MP4','/storage/lesson/lesson17.MP4'),
    		array('/storage/lesson/lesson18.MP4', 'MP4','/storage/lesson/lesson18.MP4'),
    		array('/storage/lesson/lesson19.MP4', 'MP4','/storage/lesson/lesson19.MP4'),
    		array('/storage/lesson/lesson20.MP4', 'MP4','/storage/lesson/lesson20.MP4')
    	];

		
    	
    	for ($a=1; $a < 522; $a++) {
    		$randomArrayno = $faker->numberBetween(0, 19); 

        	$lesson = new Lesson;
        	$lesson->file = $lessonLists[$randomArrayno][0];
        	$lesson->type = $lessonLists[$randomArrayno][1];
        	$lesson->content_id = $a;
            $lesson->duration= '248.16';
            $lesson->file_upload = '/storage/lesson/desginRules.pdf';
        	$lesson->created_at  = now();
        	$lesson->updated_at  = now();
        	$lesson->save();
    	}
    }
}
