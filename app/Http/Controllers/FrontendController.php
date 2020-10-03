<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FrontendController extends Controller
{
    public function StoreNewsletter(Request $request)
    {
    	$validateData = $request->validate([
    		'email' => 'required|unique:newsletters|max:50',
    	]);

    	$data = array();
    	$data['email'] = $request->email;
    	DB::table('newsletters')->insert($data);

    	$notification = array(
            'message' => 'Thanks for Suscribing',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
}
