<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Section;
use App\Models\Instructor;
use App\Models\Course;

use Faker;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

    	$section_courseOneLists = [
	        array('HTML - Hyper Text Markup Language', 'Hypertext Markup Language is the standard markup language for documents designed to be displayed in a web browser.', '1', 1, 1, 5),

			array('CSS - Cascading Style Sheet', 'Cascading Style Sheets is a style sheet language used for describing the presentation of a document written in a markup language such as HTML', '2', 1, 1, 4),
			
			array('Javascript', 'JavaScript, often abbreviated as JS, is a programming language that conforms to the ECMAScript specification. JavaScript is high-level, often just-in-time compiled, and multi-paradigm.', '3', 1, 1, 6),
			
			array('JQuery', 'jQuery is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as event handling, CSS animation, and Ajax.', '4', 1, 1, 6),
			
			array('Bootstrap', $faker->text(100), '5', 1, 1, 7),
			array('PHP', $faker->text(100), '6', 1, 1, 4),
            array('MySQL', $faker->text(100), '7', 1, 1, 4),
            array('OOP & MVC', $faker->text(100), '8', 1, 1, 4),

			array('Laravel', $faker->text(100), '9', 1, 1, 3),
			array('API', $faker->text(100), '10', 1, 1, 3),
			array('VueJS', $faker->text(100), '11', 1, 1, 3)
		];

		foreach ($section_courseOneLists as $section_courseOneList) {
            $section = new Section;
            $section->title = $section_courseOneList[0];
            $section->objective = $section_courseOneList[1];
            $section->sorting = $section_courseOneList[2];
            $section->contenttype_id = $section_courseOneList[3];
            $section->course_id = $section_courseOneList[4];
            $section->instructor_id = $section_courseOneList[5];
			$section->save();
		}

		$b = 2;
		for ($a=2; $a <=9 ; $a++) { 
            $course = Course::find($b);
            $instructor = $course->instructors()->where('course_id',$b)->first();
            $instructorid = $instructor->pivot->instructor_id; 

            $b++;

    		for ($i = 1; $i <= 10; $i++) {
                
                $section = new Section;
                $section->title = $faker->sentence();
                $section->objective = $faker->text(100);
                $section->sorting = $i;
                $section->contenttype_id = 1;
                $section->course_id = $course->id;
                $section->instructor_id = $instructorid;
    			$section->save();
    		}
        }
    }
}
