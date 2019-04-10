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

// Route::get('/details', function () {
//   return view('frontend/details');
// });
Auth::routes();
// Custom URL Login

// $this->get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
// $this->post('admin/login', 'Auth\LoginController@login');
// $this->post('admin/logout', 'Auth\LoginController@logout')->name('logout');
// // Password Reset Routes...
// $this->get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// $this->post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// $this->get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// $this->post('admin/password/reset', 'Auth\ResetPasswordController@reset');
Route::middleware('users')->group(function(){
  Route::get('admin/dashboard', 'Backend\HomeController@index')->name('home');
  Route::resource('admin/product','Backend\ProductController');
  Route::resource('admin/category','Backend\CategoryController');
});

Route::get('/','Frontend\ProductController@index');
Route::get('/details/{id}','Frontend\ProductController@show');
