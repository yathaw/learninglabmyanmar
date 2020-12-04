<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Developer';
        $user->email = 'developer@gmail.com';
        $user->password = Hash::make('mic@123');
        $user->save();
        $user->assignRole('Developer');

        $user = new User;
        $user->name = 'Admin';
        $user->email = 'admin@gmail.com';
        $user->password = Hash::make('mic@123');
        $user->save();
        $user->assignRole('Admin');

        $user = new User;
        $user->name = 'Teacher One';
        $user->email = 'teacherone@gmail.com';
        $user->password = Hash::make('123456789');
        $user->save();
        $user->assignRole('Instructor');
    }
}
