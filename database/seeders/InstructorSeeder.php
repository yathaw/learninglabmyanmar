<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instructor;
use Faker;


class InstructorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $instructorLists = [
            array($faker->jobTitle, $faker->paragraphs(3,true), $faker->domainName(), 1, 3),
            array($faker->jobTitle, $faker->paragraphs(3,true), $faker->domainName(), 1, 4),
            array($faker->jobTitle, $faker->paragraphs(3,true), $faker->domainName(), 1, 5),
            array($faker->jobTitle, $faker->paragraphs(3,true), $faker->domainName(), 1, 6),
            array($faker->jobTitle, $faker->paragraphs(3,true), $faker->domainName(), 1, 7),
            array($faker->jobTitle, $faker->paragraphs(3,true), $faker->domainName(), 1, 8),
            array($faker->jobTitle, $faker->paragraphs(3,true), $faker->domainName(), 1, 9),
        ];

        foreach ($instructorLists as $instructorList) {
            $instructor = new Instructor;
            $instructor->headline = $instructorList[0];
            $instructor->bio = $instructorList[1];
            $instructor->website = $instructorList[2];
            $instructor->twitter = $instructorList[2];
            $instructor->facebook = $instructorList[2];
            $instructor->linkedin = $instructorList[2];
            $instructor->youtube = $instructorList[2];
            $instructor->instagram = $instructorList[2];
            $instructor->status = $instructorList[3];
            $instructor->user_id = $instructorList[4];
            $instructor->created_at = now();
            $instructor->updated_at = now();
            $instructor->save();

        }
    }
}
