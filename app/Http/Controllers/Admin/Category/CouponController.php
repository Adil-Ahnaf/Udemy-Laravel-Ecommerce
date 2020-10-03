<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Coupon;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Coupon()
    {
    	$coupon = Coupon::all();
    	return view('admin.coupon.coupon', compact('coupon'));
    }

    public function StoreCoupon(Request $request)
    {
    	$validateData = $request->validate([
    		'coupon' => 'required|unique:coupons|max:30',
    		'discount' => 'required',
    	]);

    	$coupon = new Coupon;
    	$coupon->coupon = $request->coupon;
    	$coupon->discount = $request->discount;
    	$coupon->save();

    	$notification = array(
            'message' => 'Coupon Add Successfully!',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function DeleteCoupon($id)
    {
    	$coupon = Coupon::find($id);
    	$coupon->delete();

    	$notification = array(
            'message' => 'Coupon Delete Successfully!',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function EditCoupon($id)
    {
    	$coupon = Coupon::find($id);
    	return view('admin.coupon.edit_coupon', compact('coupon'));
    }

    public function UpdateCoupon(Request $request, $id)
    {
    	$validateData = $request->validate([
    		'coupon' => 'required|max:30',
    		'discount' => 'required',
    	]);

    	$coupon = Coupon::find($id);

    	$oldname = $coupon->coupon;
    	$oldDiscount = $coupon->discount;

    	$coupon->coupon = $request->coupon;
    	$coupon->discount = $request->discount;

    	$newname = $coupon->coupon;
    	$newdiscount = $coupon->discount;
    	$coupon->update();

    	if ($oldname != $newname || $oldDiscount != $newdiscount) {
    		$notification = array(
            'message' => 'Coupon Update Successfully!',
            'alert-type' => 'success'
        	);
        	return Redirect()->route('admin.coupon')->with($notification);
    	}else{
    		$notification = array(
            'message' => 'Nothing is Updated!',
            'alert-type' => 'warning'
        	);
        	return Redirect()->route('admin.coupon')->with($notification);
    	}
    }
}
