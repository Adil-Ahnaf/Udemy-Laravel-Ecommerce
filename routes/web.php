<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.index');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/logout', 'HomeController@Logout')->name('user.logout');
Route::get('change-password', 'Auth\ChangePasswordController@ChangePasswordForm')->name('change.password');
Route::post('change-password', 'Auth\ChangePasswordController@ChangePassword')->name('update.password');


//------Admin Routes--------
Route::get('/admin/home', 'AdminController@index');
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');
Route::get('admin/logout', 'AdminController@Logout')->name('admin.logout');
Route::get('admin/change-password', 'Admin\ChangePasswordController@ChangePasswordForm')->name('admin.change.password');
Route::post('admin/change-password', 'Admin\ChangePasswordController@ChangePassword')->name('admin.update.password');

Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');

Route::post('admin/password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

Route::get('admin/password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

Route::post('admin/password/reset', 'Admin\ResetPasswordController@reset')->name('admin.password.update');


// ------Admin Section--------
		//-------Category Controller---
Route::get('admin/category', 'Admin\Category\CategoryController@Category')->name('categories');
Route::post('admin/store/category', 'Admin\Category\CategoryController@StoreCategory')->name('store.categories');
Route::get('delete/category/{id}', 'Admin\Category\CategoryController@DeleteCategory');
Route::get('edit/category/{id}', 'Admin\Category\CategoryController@EditCategory');
Route::post('update/category/{id}', 'Admin\Category\CategoryController@UpdateCategory');

		//-------Brand Controller---
Route::get('admin/brand', 'Admin\Category\BrandController@Brand')->name('brands');
Route::post('admin/store/brand', 'Admin\Category\BrandController@StoreBrand')->name('store.brands');
Route::get('delete/brand/{id}', 'Admin\Category\BrandController@DeleteBrand');
Route::get('edit/brand/{id}', 'Admin\Category\BrandController@EditBrand');
Route::post('update/brand/{id}', 'Admin\Category\BrandController@UpdateBrand');

		//--------Sub Category------
Route::get('admin/sub/category', 'Admin\Category\SubCategoryController@SubCategory')->name('sub.categories');
Route::post('admin/store/subcategory', 'Admin\Category\SubCategoryController@StoreSubCategory')->name('store.sub.categories');
Route::get('delete/sub/category/{id}', 'Admin\Category\SubCategoryController@DeleteSubcategory');
Route::get('edit/sub/category/{id}', 'Admin\Category\SubCategoryController@EditSubcategory');
Route::post('update/sub-category/{id}', 'Admin\Category\SubCategoryController@UpdateSubcategory');

		//---------Coupon--------
Route::get('admin/coupon', 'Admin\Category\CouponController@Coupon')->name('admin.coupon');
Route::post('admin/store/coupon', 'Admin\Category\CouponController@StoreCoupon')->name('store.coupons');
Route::get('delete/coupon/{id}', 'Admin\Category\CouponController@DeleteCoupon');
Route::get('edit/coupon/{id}', 'Admin\Category\CouponController@EditCoupon');
Route::post('update/coupon/{id}', 'Admin\Category\CouponController@UpdateCoupon');

		//-----------Newslater----------
Route::get('admin/newsletter', 'Admin\Others\NewsletterController@Newsletter')->name('admin.newsletter');
Route::get('delete/subscribe/{id}', 'Admin\Others\NewsletterController@DeleteSubscribe');


		//--------Sun-category show with ajax----------
Route::get('/get/subcategory/{category_id}', 'Admin\Others\ProductController@GetSubCat');


		//----------Product-------------
Route::get('admin/product/all', 'Admin\Others\ProductController@index')->name('all.product');
Route::get('admin/product/add', 'Admin\Others\ProductController@create')->name('add.product');
Route::post('admin/store/product', 'Admin\Others\ProductController@store')->name('store.product');
Route::get('inactive/product/{id}', 'Admin\Others\ProductController@inactive');
Route::get('active/product/{id}', 'Admin\Others\ProductController@active');
Route::get('delete/product/{id}', 'Admin\Others\ProductController@delete');
Route::get('view/product/{id}', 'Admin\Others\ProductController@view');
Route::get('edit/product/{id}', 'Admin\Others\ProductController@edit');
Route::post('update/product/info/{id}', 'Admin\Others\ProductController@updateInfo');
Route::post('update/product/image/{id}', 'Admin\Others\ProductController@updateImage');



		//--------Blog & Post-----------
Route::get('admin/blog', 'Admin\Others\PostController@Blog')->name('blog.category');
Route::post('admin/store/blog', 'Admin\Others\PostController@StoreBlog')->name('store.blog.category');
Route::get('delete/blog/category/{id}', 'Admin\Others\PostController@DeleteBlog');
Route::get('edit/blog/category/{id}', 'Admin\Others\PostController@EditBlog');
Route::post('update/blog/category/{id}', 'Admin\Others\PostController@UpdateBlog');

Route::get('admin/post/add', 'Admin\Others\PostController@create')->name('add.post');
Route::post('admin/store/post', 'Admin\Others\PostController@store')->name('store.post');
Route::get('admin/post/all', 'Admin\Others\PostController@index')->name('all.post');
Route::get('delete/post/{id}', 'Admin\Others\PostController@delete');
Route::get('edit/post/{id}', 'Admin\Others\PostController@edit');
Route::post('update/post/{id}', 'Admin\Others\PostController@update');



//-----Frontend Routes-----
		//-----Newsletter------
Route::post('store/newsletter', 'FrontendController@StoreNewsletter')->name('store.newsletter');