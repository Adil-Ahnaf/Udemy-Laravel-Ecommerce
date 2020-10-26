<?php

namespace App\Http\Controllers\Admin\Others;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function Blog()
    {
    	$category = DB::table('post_category')->get();
    	return view('admin.blog.blog_category', compact('category'));
    }

    public function StoreBlog(Request $request)
    {
    	$validateData = $request->validate([
    		'category_name_en' => 'required|unique:post_category|max:50',
    		'category_name_bn' => 'required|unique:post_category|max:50',
    	]);

    	$data = array();
    	$data['category_name_en'] = $request->category_name_en;
    	$data['category_name_bn'] = $request->category_name_bn;
    	DB::table('post_category')->insert($data);

    	$notification = array(
            'message' => 'Blog-Category Add Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function DeleteBlog($id)
    {
    	DB::table('post_category')->where('id',$id)->delete();
    	$notification = array(
            'message' => 'Delete Successfully!',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function EditBlog($id)
    {
    	$category = DB::table('post_category')->where('id',$id)->first();
    	return view('admin.blog.edit_blog_cat', compact('category'));
    }

    public function UpdateBlog($id, Request $request)
    {
    	$validateData = $request->validate([
    		'category_name_en' => 'required|max:50',
    		'category_name_bn' => 'required|max:50',
    	]);

    	$data = array();
    	$data['category_name_en'] = $request->category_name_en;
    	$data['category_name_bn'] = $request->category_name_bn;
    	DB::table('post_category')->where('id',$id)->update($data);

    	$notification = array(
            'message' => 'Update Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('blog.category')->with($notification);
    }

    public function create()
    {
    	$category = DB::table('post_category')->get();
    	return view('admin.blog.create', compact('category'));
    }

    public function store(Request $request)
    {
    	$data = array();
    	$data['post_title_en'] = $request->post_title_en;
    	$data['post_title_bn'] = $request->post_title_bn;
    	$data['category_id'] = $request->category_id;
    	$data['post_details_en'] = $request->post_details_en;
    	$data['post_details_bn'] = $request->post_details_bn;

    	$image = $request->file('post_image');
       
        if ($image) {        
            //------for image one-------
            $image_one_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('public/media/post/'.$image_one_name);
            $data['post_image'] = 'public/media/post/'.$image_one_name;
        }
        
    	DB::table('posts')->insert($data);

    	$notification = array(
            'message' => 'Post Add Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);	
    }

    public function index()
    {
    	$post = DB::table('posts')
    			->join('post_category', 'posts.category_id', 'post_category.id')
    			->select('posts.*','post_category.category_name_en')
    			->get();
    	return view('admin.blog.show', compact('post'));
    }

    public function delete($id)
    {
    	$post = DB::table('posts')->where('id',$id)->first();
    	unlink($post->post_image);

    	DB::table('posts')->where('id',$id)->delete();
    	$notification = array(
            'message' => 'Post Delete Successfully!',
            'alert-type' => 'success'
        );

        return Redirect()->back()->with($notification);
    }

    public function edit($id)
    {
    	$post = DB::table('posts')->where('id',$id)->first();
    	$post_cat = DB::table('post_category')->get();

    	return view('admin.blog.edit', compact('post', 'post_cat'));
    }

    public function update(Request $request, $id)
    {
    	$data = array();
    	$data['post_title_en'] = $request->post_title_en;
    	$data['post_title_bn'] = $request->post_title_bn;
    	$data['category_id'] = $request->category_id;
    	$data['post_details_en'] = $request->post_details_en;
    	$data['post_details_bn'] = $request->post_details_bn;

    	$image = $request->file('post_image');
    	$old_image = $request->old_post_image;
       
        if ($image) {        
            //------for image one-------
            unlink($old_image);
            $image_one_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('public/media/post/'.$image_one_name);
            $data['post_image'] = 'public/media/post/'.$image_one_name;
        }

    	// return response()->json($data);

    	DB::table('posts')->where('id',$id)->update($data);

    	$notification = array(
            'message' => 'Post Update Successfully!',
            'alert-type' => 'success'
        );
        return Redirect()->route('all.post')->with($notification);	
    }
}
