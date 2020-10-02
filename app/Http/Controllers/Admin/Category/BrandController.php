<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Brand;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Brand()
    {
    	$brand = Brand::all();
    	return view('admin.category.brand', compact('brand'));
    }

    public function StoreBrand(Request $request)
    {
    	$validateData = $request->validate([
    		'brand_name' => 'required|unique:brands|max:50',
    	]);

    	$brand = new Brand;
    	$brand->brand_name = $request->brand_name;
    	$image = $request->file('brand_logo');
    	if ($image) {
    		$image_name = date('dmy_H_s_i');
    		$ext = strtolower($image->getClientOriginalExtension());
    		$image_fullname = $image_name.'.'.$ext;
    		$upload_path = 'public/media/brand/';
    		$image_url = $upload_path.$image_fullname;
    		$success = $image->move($upload_path, $image_fullname);

    		$brand->brand_logo = $image_url;
    		$brand->save();
    		$notification = array(
	            'message' => 'Brand Add Successfully!',
	            'alert-type' => 'success'
	        );
	        return Redirect()->back()->with($notification);
    	}else{
    		$brand->save();
    		$notification = array(
	            'message' => 'Brand Add Successfully!',
	            'alert-type' => 'success'
	        );
	        return Redirect()->back()->with($notification);
    	}	

    }

    public function DeleteBrand($id)
    {
        $brand = Brand::find($id);
        $image = $brand->brand_logo;
        if ($image) {
            unlink($image);
        }
        $brand->delete();
        $notification = array(
                'message' => 'Brand Delete Successfully!',
                'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);   
    }

    public function EditBrand($id)
    {
        $brand = Brand::find($id);
        return view('admin.category.edit_brand', compact('brand'));
    }

    public function UpdateBrand(Request $request, $id)
    {
        $validateData = $request->validate([
            'brand_name' => 'required|max:50',
        ]);

        $brand = Brand::find($id);
        $oldname = $brand->brand_name;
        $oldimage = $brand->brand_logo;
        $newname = $request->brand_name;
        $image = $request->file('brand_logo');

        if ($oldname != $newname || $image!=null) {
            if ($image) {
                if ($oldimage != null) {
                    unlink($oldimage);
                }   
                $image_name = date('dmy_H_s_i');
                $ext = strtolower($image->getClientOriginalExtension());
                $image_fullname = $image_name.'.'.$ext;
                $upload_path = 'public/media/brand/';
                $image_url = $upload_path.$image_fullname;
                $success = $image->move($upload_path, $image_fullname);

                $brand->brand_name = $newname;
                $brand->brand_logo = $image_url;
                $brand->save();
                $notification = array(
                    'message' => 'Brand Update Successfully!',
                    'alert-type' => 'success'
                );
                return Redirect()->route('brands')->with($notification);
            }else{
                $brand->brand_name = $newname;
                $brand->save();
                $notification = array(
                    'message' => 'Brand Update Successfully!',
                    'alert-type' => 'success'
                );
                return Redirect()->route('brands')->with($notification);
            }     

        }else{
            $notification = array(
                    'message' => 'Nothing Is Updated!',
                    'alert-type' => 'warning'
                );
            return Redirect()->route('brands')->with($notification);
        }
    }
}