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
    }
}
