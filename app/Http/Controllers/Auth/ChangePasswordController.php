<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ChangePasswordController extends Controller
{
    public function ChangePasswordForm()
    {
    	return view('auth.passwords.change_password');
    }

    public function ChangePassword(Request $request)
    {
      $password=Auth::user()->password;
      $oldpass=$request->oldpassword;
      $newpass=$request->password;
      $confirm=$request->password_confirmation;
      if (Hash::check($oldpass,$password)) {
           if ($newpass === $confirm) {
                      $user=User::find(Auth::id());
                      $user->password=Hash::make($request->password);
                      $user->save();
                      Auth::logout();
                      $notification = array(
			            'message' => 'Password Changed Successfully ! Now Login with Your New Password',
			            'alert-type' => 'success'
			          );  
                       return Redirect()->route('login')->with($notification); 
                 }else{
                     $notification=array(
                        'message'=>'New password and Confirm Password not matched!',
                        'alert-type'=>'error'
                         );
                       return Redirect()->back()->with($notification);
                 }     
      }else{
        $notification=array(
                'message'=>'Old Password not matched!',
                'alert-type'=>'error'
                 );
               return Redirect()->back()->with($notification);
      }
    }
}
