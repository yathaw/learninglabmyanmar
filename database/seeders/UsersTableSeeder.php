<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $userLists = [
            
            array($faker->firstNameMale, 'developer@gmail.com', 'mic@123', $faker->phoneNumber, NULL, $faker->randomDigitNotNull(), 'Developer'),
            array($faker->firstNameFemale, 'admin@gmail.com', 'mic@123', $faker->phoneNumber, NULL, $faker->randomDigitNotNull(), 'Admin'),

            array($faker->firstNameFemale, 'teacherone@gmail.com', '123456789', $faker->phoneNumber, NULL, $faker->randomDigitNotNull(), 'Instructor'),
            array($faker->firstNameMale, 'teachertwo@gmail.com', '123456789', $faker->phoneNumber, NULL, $faker->randomDigitNotNull(), 'Instructor'),
            
            array($faker->firstNameFemale, 'teacherthree@gmail.com', '123456789', $faker->phoneNumber, '1', $faker->randomDigitNotNull(), 'Instructor'),
            array($faker->firstNameMale, 'teacherfour@gmail.com', '123456789', $faker->phoneNumber, '1', $faker->randomDigitNotNull(), 'Instructor'),
            array($faker->firstNameMale, 'teacherfive@gmail.com', '123456789', $faker->phoneNumber, '1', $faker->randomDigitNotNull(), 'Instructor'),
            array($faker->firstNameMale, 'teachersix@gmail.com', '123456789', $faker->phoneNumber, '1', $faker->randomDigitNotNull(), 'Instructor'),
            array($faker->firstNameMale, 'teacherseven@gmail.com', '123456789', $faker->phoneNumber, '1', $faker->randomDigitNotNull(), 'Instructor'),

            array($faker->firstNameFemale, 'companyone@gmail.com', '123456789', $faker->phoneNumber, '1', $faker->randomDigitNotNull(), 'Business'),
            array($faker->firstNameMale, 'companytwo@gmail.com', '123456789', $faker->phoneNumber, '2', $faker->randomDigitNotNull(), 'Business'),

            array($faker->firstNameFemale, 'studentone@gmail.com', '123456789', $faker->phoneNumber, NULL, $faker->randomDigitNotNull(), 'Student'),

        ];

        foreach ($userLists as $key => $userList) {
            $user = new User;
            $user->name = $userList[0];
            $user->email = $userList[1];
            $user->phone = $userList[3];
            $user->company_id = $userList[4];
            $user->jobtitle_id = $userList[5];

            $user->password = Hash::make($userList[2]);
            $user->save();
            $user->assignRole($userList[6]);
        }

        for ($i=0; $i < 11; $i++) { 
            $user = new User;
            $user->name = $faker->name;
            $user->email = $faker->safeEmail();
            $user->phone = $faker->phoneNumber;
            $user->company_id = NULL;
            $user->jobtitle_id = $faker->randomDigitNotNull();

            $user->password = Hash::make('123456789');
            $user->save();
            $user->assignRole('Student');
        }
    }
}
