<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Category()
    {
    	$category = Category::all();
    	return view('admin.category.category', compact('category'));
    }

    public function StoreCategory(Request $request)
    {
    	$validateData = $request->validate([
    		'category_name' => 'required|unique:categories|max:50',
    	]);

    	$category = new Category;
    	$category->category_name = $request->category_name;
    	$category->save();

    	$notification = array(
            'message' => 'Category Add Successfully!',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function DeleteCategory($id)
    {
    	$category = Category::find($id);
    	$category->delete();

    	$notification = array(
            'message' => 'Category Delete Successfully!',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function EditCategory($id)
    {
    	$category = Category::find($id);
    	return view('admin.category.edit_category', compact('category'));
    }

    public function UpdateCategory(Request $request, $id)
    {
    	$validateData = $request->validate([
    		'category_name' => 'required|max:50',
    	]);
    	$category = Category::find($id);
    	$oldname = $category->category_name;
    	$category->category_name = $request->category_name;
    	$newname = $category->category_name;
    	$category->update();

    	if ($oldname != $newname) {
    		$notification = array(
            'message' => 'Category Update Successfully!',
            'alert-type' => 'success'
        	);
        	return Redirect()->route('categories')->with($notification);
    	}else{
    		$notification = array(
            'message' => 'Nothing is Updated!',
            'alert-type' => 'warning'
        	);
        	return Redirect()->route('categories')->with($notification);
    	}
    }
}
