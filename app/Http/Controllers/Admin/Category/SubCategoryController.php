<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Subcategory;
use DB;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function SubCategory()
    {
    	$subcategory = Subcategory::all();
    	$category = DB::table('categories')->get();
    	return view('admin.category.subcategory', compact('subcategory', 'category'));
    }

    public function StoreSubCategory(Request $request)
    {
    	$validateData = $request->validate([
    		'subcategory_name' => 'required|max:50',
    		'category_id' => 'required',
    	]); 

    	$subcategory = new Subcategory;
    	$subcategory->subcategory_name = $request->subcategory_name;
    	$subcategory->category_id = $request->category_id;
    	$subcategory->save();

    	$notification = array(
            'message' => 'Sub-category Add Successfully!',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function DeleteSubcategory($id)
    {
    	$subcategory = Subcategory::find($id);
    	$subcategory->delete();

    	$notification = array(
            'message' => 'Sub-category Delete Successfully!',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function EditSubcategory($id)
    {
    	$subcategory = Subcategory::find($id);
    	$category = DB::table('categories')->get();
    	return view('admin.category.edit_subcategory', compact('subcategory','category'));
    }

    public function UpdateSubcategory(Request $request, $id)
    {
    	$validateData = $request->validate([
    		'subcategory_name' => 'required|max:50',
    		'category_id' => 'required',
    	]); 

    	$subcategory = Subcategory::find($id);

    	$old_subcategory = $subcategory->subcategory_name;
    	$old_categoryid = $subcategory->category_id;

    	$subcategory->subcategory_name = $request->subcategory_name;
    	$subcategory->category_id = $request->category_id;

    	$new_subcategory = $subcategory->subcategory_name;
    	$new_categoryid = $subcategory->category_id;

    	$subcategory->save();

    	if($new_subcategory != $old_subcategory || $new_categoryid != $old_categoryid){
    		$notification = array(
            'message' => 'Sub-category Update Successfully!',
            'alert-type' => 'success'
        	);
        	return Redirect()->route('sub.categories')->with($notification);
    	}else{
    		$notification = array(
            'message' => 'Nothing is Updated!',
            'alert-type' => 'warning'
        	);
        	return Redirect()->route('sub.categories')->with($notification);
    	}
    }
}
