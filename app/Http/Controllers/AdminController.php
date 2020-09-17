<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.home');
    }

    public function Logout()
    {
        Auth::logout();
        $notification = array(
            'message' => 'Successfully! Logout',
            'alert-type' => 'success'
        );

        return Redirect()->route('login')->with($notification);
    }
    
}
