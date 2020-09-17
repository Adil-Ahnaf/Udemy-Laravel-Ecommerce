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
    return view('welcome');
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