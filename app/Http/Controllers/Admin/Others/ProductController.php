<?php

namespace App\Http\Controllers\Admin\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Product;
use DB;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $product = Product::all();
        // return response()->json($product);
    	return view('admin.product.show', compact('product'));
    }

    public function create(Request $request)
    {
    	$category = DB::table('categories')->get();
    	$brand = DB::table('brands')->get();
    	return view('admin.product.create', compact('category', 'brand'));
    }

    public function GetSubCat($category_id)
    {
        $cat = DB::table('subcategories')->where('category_id',$category_id)->get();
        return json_encode($cat);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'product_code' => 'required|unique:products|max:5',
            'image_one' => 'required|mimes:jpeg,png,jpg|max:1000',
            'image_two' => 'required|mimes:jpeg,png,jpg|max:1000',
            'image_three' => 'required|mimes:jpeg,png,jpg|max:1000',
        ]);

        $product = new Product;
        $product->product_name      = $request->product_name;
        $product->product_code      = $request->product_code;
        $product->product_quantity  = $request->product_quantity;
        $product->category_id       = $request->category_id;
        $product->subcategory_id    = $request->subcategory_id;
        $product->brand_id          = $request->brand_id;
        $product->product_size      = $request->product_size;
        $product->product_color     = $request->product_color;
        $product->selling_price     = $request->selling_price;
        $product->product_details   = $request->product_details;
        $product->video_link        = $request->video_link;
        $product->main_slider       = $request->main_slider;
        $product->mid_slider        = $request->mid_slider;
        $product->hot_deal          = $request->hot_deal;
        $product->hot_new           = $request->hot_new;
        $product->best_rated        = $request->best_rated;
        $product->trend             = $request->trend;
        $product->status            = 1;


        $image1 = $request->file('image_one');
        $image2 = $request->file('image_two');
        $image3 = $request->file('image_three');

        if ($image1 && $image2 && $image3) {
            
            //------for image one-------
            $image_one_name = hexdec(uniqid()).'.'.$image1->getClientOriginalExtension();
            Image::make($image1)->resize(300,300)->save('public/media/product/'.$image_one_name);
            $product->image_one = 'public/media/product/'.$image_one_name;

            //------for image two-------
            $image_two_name = hexdec(uniqid()).'.'.$image2->getClientOriginalExtension();
            Image::make($image2)->resize(300,300)->save('public/media/product/'.$image_two_name);
            $product->image_two = 'public/media/product/'.$image_two_name;

            //------for image three-------
            $image_three_name = hexdec(uniqid()).'.'.$image3->getClientOriginalExtension();
            Image::make($image3)->resize(300,300)->save('public/media/product/'.$image_three_name);
            $product->image_three = 'public/media/product/'.$image_three_name;
      
        }

        $product->save();

        if ($product) {
            $notification = array(
                'message' => 'Product Add Successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Something Went Wrong!',
                'alert-type' => 'warning'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function inactive($id)
    {
        $product = Product::find($id);
        $product->status = 0;
        $product->update();

        $notification = array(
                'message' => 'Product Inactive Successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    public function active($id)
    {
        $product = Product::find($id);
        $product->status = 1;
        $product->status = 1;
        $product->status = 1;
        $product->status = 1;
        $product->status = 1;
        $product->status = 1;
        $product->status = 1;
        $product->status = 1;
        $product->status = 1;
        $product->status = 1;
        $product->status = 1;
        $product->status = 1;
        $product->status = 1;
        $product->update();

        $notification = array(
                'message' => 'Product Active Successfully!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $image1 = $product->image_one;
        $image2 = $product->image_two;
        $image3 = $product->image_three;
        unlink($image1);
        unlink($image2);
        unlink($image3);
        $product->delete();

        $notification = array(
                'message' => 'Product Delete Successfully!',
                'alert-type' => 'success'
            );
        return Redirect()->back()->with($notification);
    }

    public function view($id)
    {
        $product = Product::find($id);
        return view('admin.product.view', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::find($id);
        $pro_cat = $product->category_id;
        $category = DB::table('categories')->get();
        $subcategory = DB::table('subcategories')
                        ->where('subcategories.category_id',$pro_cat)
                        ->get();
        $brand = DB::table('brands')->get();

        return view('admin.product.edit', compact('product', 'category', 'subcategory', 'brand'));
    }

    public function updateInfo(Request $request, $id)
    {
        $product = Product::find($id);
        $product->product_name      = $request->product_name;
        $product->product_code      = $request->product_code;
        $product->product_quantity  = $request->product_quantity;
        $product->category_id       = $request->category_id;
        $product->subcategory_id    = $request->subcategory_id;
        $product->brand_id          = $request->brand_id;
        $product->product_size      = $request->product_size;
        $product->product_color     = $request->product_color;
        $product->selling_price     = $request->selling_price;
        $product->product_details   = $request->product_details;
        $product->video_link        = $request->video_link;
        $product->main_slider       = $request->main_slider;
        $product->mid_slider        = $request->mid_slider;
        $product->hot_deal          = $request->hot_deal;
        $product->hot_new           = $request->hot_new;
        $product->best_rated        = $request->best_rated;
        $product->trend             = $request->trend;

        $product->save();   
        $notification = array(
                'message' => 'Product Update Successfully!',
                'alert-type' => 'success'
            );
        return Redirect()->route('all.product')->with($notification);
    }


    public function updateImage(Request $request, $id)
    {
        $product  = Product::find($id);
        
        $old_one = $product->image_one;
        $old_two = $product->image_two;
        $old_three = $product->image_three;

        $new_one = $request->file('image_one');
        $new_two = $request->file('image_two');
        $new_three = $request->file('image_three');

        if ($new_one) {
            unlink($old_one);
            $image_one_name = hexdec(uniqid()).'.'.$new_one->getClientOriginalExtension();
            Image::make($new_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
            $product->image_one = 'public/media/product/'.$image_one_name;
        }

         if ($new_two) {
            unlink($old_two);
            $image_two_name = hexdec(uniqid()).'.'.$new_two->getClientOriginalExtension();
            Image::make($new_two)->resize(300,300)->save('public/media/product/'.$image_two_name);
            $product->image_two = 'public/media/product/'.$image_two_name;
        }

         if ($new_three) {
            unlink($old_three);
             $image_three_name = hexdec(uniqid()).'.'.$new_three->getClientOriginalExtension();
            Image::make($new_three)->resize(300,300)->save('public/media/product/'.$image_three_name);
            $product->image_three = 'public/media/product/'.$image_three_name;
        }

        $product->save();
        $notification = array(
                'message' => 'Image Update Successfully!',
                'alert-type' => 'success'
            );
        return Redirect()->route('all.product')->with($notification);
    }
}
