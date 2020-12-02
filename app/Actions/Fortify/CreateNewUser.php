<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role' => 'required',
            'phone' => 'required',
        ])->validate();

       
        $imageName = time().'.'.$input['photo']->extension();
            
        $path = '/profiles/'.$imageName;
       
        $input['photo']->move(public_path('profiles'), $imageName);


        if($input['role'] == 'Student'){

            $user =User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'phone' => $input['phone'],
                'profile_photo_path' => $path,
            ]);

            $user->assignRole('Student');
            return $user;
            //return redirect()->route('frontend.index');

        }elseif($input['role'] == 'Instructor'){

            $user =User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'phone' => $input['phone'],
                'profile_photo_path' => $path,

            ]);
            $user->assignRole('Instructor');
            return $user;


        }else{

            $user =User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
                'phone' => $input['phone'],
                'profile_photo_path' => $path,
                
            ]);
            $user->assignRole('Business');
            return $user;
            // return redirect()->route('business_info');

        }

        
    }
}
