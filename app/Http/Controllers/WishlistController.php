<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class WishlistController extends Controller
{
    public function AddWishlist($id)
    {
    	$userid = Auth::id();
    	$data = array(
    		'user_id' => $userid,
    		'product_id' => $id,
    	);

    	$check = DB::table('wishlists')->where('user_id',$userid)->where('product_id',$id)->first();

    	if(Auth::check()){
    		if ($check) {
            	return \Response::json(['error' => 'Already Has In Wishlist']);
    		}else{
    			DB::table('wishlists')->insert($data);
    			return \Response::json(['success' => 'Added In Wishlist']);
    		}
    	}else{
    		return \Response::json(['error' => 'Login! Your Account First']);
    	}

    }
}
