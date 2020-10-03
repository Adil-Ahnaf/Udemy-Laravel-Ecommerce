<?php

namespace App\Http\Controllers\Admin\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Newsletter()
    {
    	$sub = DB::table('newsletters')->get();
    	return view('admin.newsletter.newsletter', compact('sub'));
    }

    public function DeleteSubscribe($id)
    {
    	DB::table('newsletters')->where('id',$id)->delete();
    	$notification = array(
            'message' => 'Subscriber Delete Successfully!',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

}
