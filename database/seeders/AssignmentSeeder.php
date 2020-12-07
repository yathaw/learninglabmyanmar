<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assignment;

use Faker;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $assignmentLists = [
    		array('/storage/assignment/span_exercise.png', 'png', 10),
    		array('/storage/assignment/flex.png', 'png', 21),
    		array('/storage/assignment/coffee.png', 'png', 22),
    		array('/storage/assignment/FrotendTest.pdf', 'pdf', 44),
    	];

    	foreach($assignmentLists as $assignmentList)
    	{
        	$assignment = new Assignment;
        	$assignment->file = $assignmentList[0];
        	$assignment->type = $assignmentList[1];
        	$assignment->content_id = $assignmentList[2];
        	$assignment->created_at  = now();
        	$assignment->updated_at  = now();
        	$assignment->save();
    	}
    }
}
