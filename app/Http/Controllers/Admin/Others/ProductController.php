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
    	return view('admin.product.show');
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

        $notification = array(
            'message' => 'Product Add Successfully!',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }
}
