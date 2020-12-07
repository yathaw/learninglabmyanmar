<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Content;
use Faker;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = \Faker\Factory::create();

    	$section_Onelists = [
    		array('Introduction', '', 1, 1, 1),
    		array('Structure', '',2, 1, 1),
    		array('Text', '',3, 1, 1),
    		array('List', '',4, 1, 1),
    		array('Links', '',5, 1, 1),
    		array('Tables', '',6, 1, 1),
    		array('Images', '',7, 1, 1),
    		array('Forms', '',8, 1, 1),
    		array('Div', '',9, 1, 1),
    		array('Span Exercise', '',10, 3, 1), // ~ 10

    	];
    	foreach ($section_Onelists as $key => $section_Onelist) {
        	$content = new Content;
        	$content->title = $section_Onelist[0];
        	$content->description = $section_Onelist[1];
        	$content->sorting = $section_Onelist[2];
        	$content->contenttype_id = $section_Onelist[3];
        	$content->section_id = $section_Onelist[4];
        	$content->created_at  = now();
        	$content->updated_at  = now();
        	$content->save();
        }

        $section_Twolists = [
    		array('Introduction', '', 1, 1, 2),
    		array('CSS Inclusion', '',2, 1, 2),
    		array('Color', '',3, 1, 2),
    		array('Measurement Units', '',4, 1, 2),
    		array('CSS Selector', '',5, 1, 2),
    		array('Pseudo Selector', '',6, 1, 2),
    		array('Box Model', '',7, 1, 2),
    		array('Layout', '',8, 1, 2),
    		array('Position', '',9, 1, 2),
    		array('Typography', '',10, 1, 2),
    		array('Flex Exercise', '',11, 3, 2), // ~ 21
    		array('CSS Coffee World Project', '',12, 3, 2), // ~ 22


    	];
    	foreach ($section_Twolists as $key => $section_Twolist) {
        	$content = new Content;
        	$content->title = $section_Twolist[0];
        	$content->description = $section_Twolist[1];
        	$content->sorting = $section_Twolist[2];
        	$content->contenttype_id = $section_Twolist[3];
        	$content->section_id = $section_Twolist[4];
        	$content->created_at  = now();
        	$content->updated_at  = now();
        	$content->save();
        }

        for ($a=3; $a < 6; $a++) { 
        	for ($b=1; $b < 8; $b++) { 
	        	$content = new Content;
	        	$content->title = $faker->sentence(3);
	        	$content->description = '';
	        	$content->sorting = $b;
	        	$content->contenttype_id = 1;
	        	$content->section_id = $a;
	        	$content->created_at  = now();
	        	$content->updated_at  = now();
	        	$content->save();
        	}
        }

        $section_Sixlists = [
    		array('Frontend Test', '', 1, 3, 6), // ~ 44

    		array('Introduction', '', 2, 1, 6),
    		array('Working with Text', '',3, 1, 6),
    		array('Working with Number', '',4, 1, 6),
    		array('Condition', '',5, 1, 6),
    		array('Looping', '',6, 1, 6),
    		array('Array', '',7, 1, 6),
    		array('Array Setting', '',8, 1, 6),
    		array('Array Sorting', '',9, 1, 6),
    		array('Function', '',10, 1, 6),
    		array('Argument Function', '',11, 1, 6),
    		array('Variable', '',12, 1, 6),
    		array('Date and Times', '',13, 1, 6),
    		array('Super global variables', '',14, 1, 6),
    		array('Cookie and Session', '',15, 1, 6),


    	];
    	foreach ($section_Sixlists as $key => $section_Sixlist) {
        	$content = new Content;
        	$content->title = $section_Sixlist[0];
        	$content->description = $section_Sixlist[1];
        	$content->sorting = $section_Sixlist[2];
        	$content->contenttype_id = $section_Sixlist[3];
        	$content->section_id = $section_Sixlist[4];
        	$content->created_at  = now();
        	$content->updated_at  = now();
        	$content->save();
        }

        $section_Sevenlists = [
    		array('Introduction', '', 1, 1, 7),
    		array('select Statement', '',2, 1, 7),
    		array('select DISTINCT Statement', '',3, 1, 7),
    		array('where Clause', '',4, 1, 7),
    		array('and Operator', '',5, 1, 7),
    		array('or Operator', '',6, 1, 7),
    		array('Order By Keyword', '',7, 1, 7),
    		array('insert into Statement', '',8, 1, 7),
    		array('Update Statement', '',9, 1, 7),
    		array('delete Statement', '',10, 1, 7),
    		array('Like Operator', '',11, 1, 7),
    		array('IN Operator', '',12, 1, 7),
    		array('between Operator', '',13, 1, 7),
    		array('not between Operator', '',14, 1, 7),
    		array('SQL Join', '',15, 1, 7),
    		array('LEFT Join Keyword', '',16, 1, 7),
    		array('RIGHT Join Keyword', '',17, 1, 7),
    		array('FULL Join Keyword', '',18, 1, 7),
    		array('COUNT() Function', '',19, 1, 7),
    		array('MAX Function', '',20, 1, 7),
    		array('MIN Function', '',21, 1, 7),
    		array('SUM Function', '',22, 1, 7),
    		array('GROUP BY Statement', '',23, 1, 7),
    	];
    	foreach ($section_Sevenlists as $key => $section_Sevenlist) {
        	$content = new Content;
        	$content->title = $section_Sevenlist[0];
        	$content->description = $section_Sevenlist[1];
        	$content->sorting = $section_Sevenlist[2];
        	$content->contenttype_id = $section_Sevenlist[3];
        	$content->section_id = $section_Sevenlist[4];
        	$content->created_at  = now();
        	$content->updated_at  = now();
        	$content->save();
        }

        $section_Eightlists = [
    		array('Class', '', 1, 1, 8),
    		array('Object', '',2, 1, 8),
    		array('Namespace', '',3, 1, 8),
    		array('Model, View, Controller', '',4, 1, 8)

    	];
        foreach ($section_Eightlists as $key => $section_Eightlist) {
        	$content = new Content;
        	$content->title = $section_Eightlist[0];
        	$content->description = $section_Eightlist[1];
        	$content->sorting = $section_Eightlist[2];
        	$content->contenttype_id = $section_Eightlist[3];
        	$content->section_id = $section_Eightlist[4];
        	$content->created_at  = now();
        	$content->updated_at  = now();
        	$content->save();
        }

        $section_Ninelists = [
    		array('Application Structure', '', 1, 1, 9),
    		array('Configuration', '',2, 1, 9),
    		array('Route', '',3, 1, 9),
    		array('Request', '',4, 1, 9),
    		array('Response', '',5, 1, 9),
    		array('Redirections', '',6, 1, 9),
    		array('View', '',7, 1, 7),
    		array('Blade Template Engine', '',8, 1, 9),
    		array('Controller', '',9, 1, 9),
    		array('Model', '',10, 1, 9),
    		array('Migration', '',11, 1, 9),
    		array('Factory', '',12, 1, 9),
    		array('Seeding', '',13, 1, 9),
    		array('Form', '',14, 1, 7),
    		array('Validation', '',15, 1, 9),
    		array('File uploading', '',16, 1, 9),
    		array('CSRF Protection', '',17, 1, 9),
    		array('Eloquent Relationship', '',18, 1, 9),
    		array('Authentication', '',19, 1, 9),
    		array('Authorization', '',20, 1, 9),
    		array('Spatie (manage user roles and permissions)', '',21, 1, 9),

    	];
    	foreach ($section_Ninelists as $key => $section_Ninelist) {
        	$content = new Content;
        	$content->title = $section_Ninelist[0];
        	$content->description = $section_Ninelist[1];
        	$content->sorting = $section_Ninelist[2];
        	$content->contenttype_id = $section_Ninelist[3];
        	$content->section_id = $section_Ninelist[4];
        	$content->created_at  = now();
        	$content->updated_at  = now();
        	$content->save();
        }

        $section_Tenlists = [
    		array('Why API', '', 1, 1, 10),
    		array('Routes', '',2, 1, 10),
    		array('Resources', '',3, 1, 10),
    		array('Relationships', '',4, 1, 10),
    		array('Passport (Authentication)', '',5, 1, 10),
    		array('Collaboration Platform (Postman)', '',6, 1, 10),

    	];
        foreach ($section_Tenlists as $key => $section_Tenlist) {
        	$content = new Content;
        	$content->title = $section_Tenlist[0];
        	$content->description = $section_Tenlist[1];
        	$content->sorting = $section_Tenlist[2];
        	$content->contenttype_id = $section_Tenlist[3];
        	$content->section_id = $section_Tenlist[4];
        	$content->created_at  = now();
        	$content->updated_at  = now();
        	$content->save();
        }

        $section_Elevenlists = [
    		array('Introduction', '', 1, 1, 11),
    		array('Declarative Rendering', '',2, 1, 11),
    		array('Component Composition', '',3, 1, 11),
    		array('Setup CLI Project', '',4, 1, 11),
    		array('Introduction Components', '',5, 1, 11),
    		array('Passing Data to Components', '',6, 1, 11),
    		array('Using UI Frameworks', '',7, 1, 11),
    		array('Routing (SPA)', '',8, 1, 11),
    		array('Working with API', '',9, 1, 11),
    		array('State Management', '',10, 1, 11),
    	];
        foreach ($section_Elevenlists as $key => $section_Elevenlist) {
        	$content = new Content;
        	$content->title = $section_Elevenlist[0];
        	$content->description = $section_Elevenlist[1];
        	$content->sorting = $section_Elevenlist[2];
        	$content->contenttype_id = $section_Elevenlist[3];
        	$content->section_id = $section_Elevenlist[4];
        	$content->created_at  = now();
        	$content->updated_at  = now();
        	$content->save();
        }

    	$contentLists = [
	        array($faker->sentence(3), '',1),
	    ];

	    for ($c=2; $c < 69; $c++) { 
        	for ($d=1; $d < 8; $d++) { 
	        	$content = new Content;
	        	$content->title = $faker->sentence(3);
	        	$content->description = '';
	        	$content->sorting = $d;
	        	$content->contenttype_id = 1;
	        	$content->section_id = $c;
	        	$content->created_at  = now();
	        	$content->updated_at  = now();
	        	$content->save();
        	}
        }

        
    }
}
