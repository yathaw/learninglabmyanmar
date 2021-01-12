<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;
use Faker;
use Illuminate\Support\Facades\DB;


class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

    	$courseLists = [
			array('PHP Web Development', 
				'Learn PHP for Web Development. Php is a popular Programming Language for a reason! Become a backend coder today!', 
				'<div class=\"ql-editor\" data-gramm=\"true\" contenteditable=\"true\"><p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ta2/2/16/1f380.png\" alt=\"🎀\" height=\"16\" width=\"16\"> ကွန်ပျူတာတက္ကသိုလ်နင့် နည်းပညာတက္ကသိုလ်များမှ ကျောင်းတက်နေဆဲ ကျောင်းသားလူငယ်များ</p><p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ta2/2/16/1f380.png\" alt=\"🎀\" height=\"16\" width=\"16\"> လုပ်ငန်းခွင်ဝင်ဖို့ ပြင်ဆင်နေသော လူငယ်များ</p><p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ta2/2/16/1f380.png\" alt=\"🎀\" height=\"16\" width=\"16\"> ပြည်တွင်း/ ပြည်ပ အိုင်တီကုမ္ပဏီများတွင် ယုံကြည်မှုရှိရှိအလုပ်ဝင်ဖို့ ပြင်ဆင်နေသူများ</p><p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/ta2/2/16/1f380.png\" alt=\"🎀\" height=\"16\" width=\"16\"> ကိုယ့်ရဲ့ Programming Skill ကိုထပ်မံမွမ်းမံလိုသော လူငယ်များ</p><p>တက်ရောက်သင့်သော သင်တန်းဖြစ်ပါတယ်။</p><p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t4f/2/16/1f3af.png\" alt=\"🎯\" height=\"16\" width=\"16\"> သင်တန်းရဲ့ Course Outline က…..????</p><p>1. Web Design</p><p>2. Database Technology</p><p>3. PHP MySql &amp; Bootstrap UI ( Dynamic Application - mini project)</p><p>4. MVC OOP &amp; Laravel - mini project</p><p>5. Laravel RESTFul API &amp; Vue JS CLI project</p><p>6. Software Engineering Fundamental</p><p>7. Laravel Group Project and Presentation</p><p> သင်တန်းပြီးတာနဲ့ Junior Web Developer တစ်ယောက်အနေနဲ့အလုပ်ဝင်နိုင်ဖို့ လိုအပ်တာတွေကိုပဲ သင်ကြားပေးမှာဖြစ်ပါတယ်။</p></div><div class=\"ql-clipboard\" contenteditable=\"true\" tabindex=\"-1\"></div><div class=\"ql-tooltip ql-hidden\"><a class=\"ql-preview\" target=\"_blank\" href=\"about:blank\"></a><input type=\"text\" data-formula=\"e=mc^2\" data-link=\"https://quilljs.com\" data-video=\"Embed URL\"><a class=\"ql-action\"></a><a class=\"ql-remove\"></a></div>', 
				'/storage/courseimg/11111.jpg', 
				'/storage/coursevideo/12345.mp4', 
				'[[\"Web Design\",\"Database Technology\",\"PHP MySql & Bootstrap UI ( Dynamic Application - mini project)\",\"MVC OOP & Laravel - mini project\",\"Laravel RESTFul API & Vue JS CLI project\",\"Software Engineering Fundamental\",\"Laravel Group Project and Presentation\"]]',
				1, 
				'[[\"No programming skills necessary to take this course.\",\"A computer with Internet Access is needed to write code\"]]', 
				'on', 
				'0', 
				120000, 
				4, 
				1,
                $faker->randomDigitNotNull()),
    		
    		array($faker->sentence(3), 
    			$faker->sentences(3, true), 
    			$faker->randomHtml(), 
    			'/storage/courseimg/22222.jpg', 
    			'/storage/coursevideo/56789.mp4', 
    			json_encode([ $faker->paragraph(1),$faker->paragraph(1),$faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1) ]),
    			1, 
    			json_encode([ $faker->paragraph(1),$faker->paragraph(1),$faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1)]),
    			'on', 
    			'0', 
    			50000, 
    			4, 
    			$faker->randomDigitNotNull()),

    		array($faker->sentence(3), 
    			$faker->sentences(3, true), 
    			$faker->randomHtml(), 
    			'/storage/courseimg/33333.jpg', 
    			'/storage/coursevideo/56789.mp4', 
    			json_encode([ $faker->paragraph(1),$faker->paragraph(1),$faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1) ]),
    			1, 
    			json_encode([ $faker->paragraph(1),$faker->paragraph(1),$faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1)]),
    			'on', 
    			'0', 
    			50000, 
    			4, 
    			$faker->randomDigitNotNull()),

    		array($faker->sentence(3), 
    			$faker->sentences(3, true), 
    			$faker->randomHtml(), 
    			'/storage/courseimg/44444.jpg', 
    			'/storage/coursevideo/56789.mp4', 
    			json_encode([ $faker->paragraph(1),$faker->paragraph(1),$faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1) ]),
    			1, 
    			json_encode([ $faker->paragraph(1),$faker->paragraph(1),$faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1)]),
    			'on', 
    			'0', 
    			50000, 
    			4, 
    			$faker->randomDigitNotNull()),

    		array($faker->sentence(3), 
    			$faker->sentences(3, true), 
    			$faker->randomHtml(), 
    			'/storage/courseimg/55555.jpg', 
    			'/storage/coursevideo/56789.mp4', 
    			json_encode([ $faker->paragraph(1),$faker->paragraph(1),$faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1) ]),
    			1, 
    			json_encode([ $faker->paragraph(1),$faker->paragraph(1),$faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1)]),
    			'on', 
    			'0', 
    			50000, 
    			4, 
    			$faker->randomDigitNotNull()),

    		array($faker->sentence(3), 
    			$faker->sentences(3, true), 
    			$faker->randomHtml(), 
    			'/storage/courseimg/66666.jpg', 
    			'/storage/coursevideo/56789.mp4', 
    			json_encode([ $faker->paragraph(1),$faker->paragraph(1),$faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1) ]),
    			1, 
    			json_encode([ $faker->paragraph(1),$faker->paragraph(1),$faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1)]),
    			'on', 
    			'0', 
    			50000, 
    			4, 
    			$faker->randomDigitNotNull()),

    		array($faker->sentence(3), 
    			$faker->sentences(3, true), 
    			$faker->randomHtml(), 
    			'/storage/courseimg/77777.jpg', 
    			'/storage/coursevideo/56789.mp4', 
    			json_encode([ $faker->paragraph(1),$faker->paragraph(1),$faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1) ]),
    			1, 
    			json_encode([ $faker->paragraph(1),$faker->paragraph(1),$faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1)]),
    			'on', 
    			'0', 
    			50000, 
    			4, 
    			$faker->randomDigitNotNull()),

    		array($faker->sentence(3), 
    			$faker->sentences(3, true), 
    			$faker->randomHtml(), 
    			'/storage/courseimg/88888.jpg', 
    			'/storage/coursevideo/56789.mp4', 
    			json_encode([ $faker->paragraph(1),$faker->paragraph(1),$faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1) ]),
    			1, 
    			json_encode([ $faker->paragraph(1),$faker->paragraph(1),$faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1)]),
    			'on', 
    			'0', 
    			50000, 
    			4, 
    			$faker->randomDigitNotNull()),

    		array($faker->sentence(3), 
    			$faker->sentences(3, true), 
    			$faker->randomHtml(), 
    			'/storage/courseimg/99999.jpg', 
    			'/storage/coursevideo/56789.mp4', 
    			json_encode([ $faker->paragraph(1),$faker->paragraph(1),$faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1) ]),
    			1, 
    			json_encode([ $faker->paragraph(1),$faker->paragraph(1),$faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1), $faker->paragraph(1)]),
    			'on', 
    			'0', 
    			50000, 
    			4, 
    			$faker->randomDigitNotNull()),
    	]; 

    	foreach ($courseLists as $courseList) {
	        $course = Course::create([
	        	'title'			=> $courseList[0],
	        	'subtitle'		=> $courseList[1],
	        	'description'	=> $courseList[2],
	        	'image'			=> $courseList[3],
	        	'video'			=> $courseList[4],
	        	'status'		=> $courseList[6],
	        	'outline'		=> $courseList[5],
	        	'requirements'	=> $courseList[7],

	        	'certificate'	=> $courseList[8],
	        	'share'			=> $courseList[9],
	        	'price'			=> $courseList[10],
	        	'level_id'		=> $courseList[11],
	        	'subcategory_id'=> $courseList[12],
                'user_id'       => 2,
	        	'created_at'	=> now(),
	        	'updated_at'	=> now(),
	        ]);
        }

        for ($a = 3; $a <= 7; $a++) {
	        DB::table('course_instructor')->insert([
	            'course_id'     => 1,
	            'instructor_id' => $a,
	            'created_at' => now(),
	            'updated_at' => now()
	        ]);

	    }


        for ($b = 2; $b <= 9; $b++) {
            $randomId = $faker->numberBetween(1, 2);

	        DB::table('course_instructor')->insert([
	            'course_id'     => $b,
	            'instructor_id' => $randomId,
	            'created_at' => now(),
	            'updated_at' => now()
	        ]);
	    }


    }
}
