<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Jobtitle;
use Illuminate\Support\Facades\Hash;

class CompanyProfileController extends Controller
{
    //
  public function companyprofile($id)
    {
      $user = User::find($id);
      $userid = Auth::id();
      if($id == $userid){
        return view('companyprofile.companyprofileinfo',compact('user'));
      }else{
        return redirect()->back();
      }
    }

  public function companyprofileedit($id)
  {
    $user = User::find($id);
    $userid = Auth::id();
    if($id == $userid){
      $jobtitles = Jobtitle::all();
      return view('companyprofile.companyprofileupdate',compact('user','jobtitles'));
    }else{
      return redirect()->back();
    }
  }

  public function companyprofileupdate(Request $request,$id)
    {
      $request->validate([
            'name' => 'required',
            'newphoto' => 'sometimes|mimes:jpeg,jpg,png,gif|max:100000',
            'email'=>'required',
            'phone' => 'required',
            'companyname' => 'required',
            'newlogo' => 'sometimes|mimes:jpeg,jpg,png,gif|max:100000',
            'jobtitleid'=>'required',
            'address' => 'required',
            'description' => 'required',
        ]);
        $user = User::find($id);

        if($request->hasfile('newphoto')){
              $newphoto = $request->file('newphoto');
              $upload_dir = public_path().'/userprofile/';
              $name = time().'.'.$newphoto->getClientOriginalExtension();
              $newphoto->move($upload_dir,$name);
              $path = '/userprofile/'.$name;
        }else{
            $path = request('oldphoto');
        }

        $user->name = request('name');
        $user->email = request('email');
        $user->phone  = request('phone');
        $user->profile_photo_path = $path;
        $user->jobtitle_id = request('jobtitleid');
        $user->save();

        if($request->hasfile('newlogo')){
              $newlogo = $request->file('newlogo');
              $upload_dir = public_path().'/business/';
              $name = time().'.'.$newlogo->getClientOriginalExtension();
              $newlogo->move($upload_dir,$name);
              $logopath = '/business/'.$name;
        }else{
            $logopath = request('oldlogo');
        }

        $user->company->name = request('companyname');
        $user->company->logo= $logopath;
        $user->company->address = request('address');
        $user->company->description = request('description');
        $user->company->save();
     
        return redirect()->route('companyprofile',$id);
    }

    public function companyprofilechangepassword($id,Request $request)
    {
      $password = Hash::make($request->password);

      $user = User::find($id);
      $user->password = $password;
      $user->save();

      return redirect()->route('companyprofile',$id);

    }

    public function companychangepassword($id)
    {
      $user = User::find($id);
      $userid = Auth::id();
      if($id == $userid){
        return view('companyprofile.companychangepassword',compact('user'));
      }else{
        return redirect()->back();
      }
    }

    public function companyupdatepassword(Request $request,$id)
  {
    // dd($request);
    $request->validate([
      'email' => ['unique:users,email,'.$id],
      'changepassword' => 'required|confirmed|min:5',
      'changepassword_confirmation' => 'required'
    ]);
    $email = $request->email;
    $changepassword = $request->changepassword;
    $confirmpassword = $request->changepassword_confirmation;
    $currentpassword = $request->currentpassword;

    $user = User::find($id);

    if(Hash::check($changepassword,$user->password)){
      
      return back()->with('msg','You current password are same match in our record.
        And New Password Change');
        
    }else{
     $user->password = Hash::make($changepassword);
      $user->email = $email;
      $user->save();

      return redirect()->route('login')->with('success','Successfully change Password!');
      
    }

  }
}
