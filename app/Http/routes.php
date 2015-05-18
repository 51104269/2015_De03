<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

//----Administration Routes
Route::get('/password/email', 'adminController@password');

Route::get('/admin', 'AdminController@index');

Route::post('auth/admin-login', 'adminController@login');

Route::get('auth/admin-logout', 'adminController@logout');
//-------------------------
//---User Routes
Route::get('loginView', 'AccountController@loginView');
Route::get('signupView', 'AccountController@signupView');
//Route::get('auth/edit', 'AccountController@editView');
Route::post('auth/user-login', 'AccountController@login');
Route::post('auth/user-edit', 'AccountController@editUser');
//Route::get('auth/user-logout', 'AccountController@logout');
Route::post('auth/user-signup', 'AccountController@signup');
Route::get('auth/edit', ['middleware' => 'auth', 'uses' => 'AccountController@editView']);
Route::get('auth/user-logout', ['middleware' => 'auth', 'uses' => 'AccountController@logout']);

Route::any("category/index", [
  "as"   => "category/index",
  "uses" => "CategoryController@index"
]);

Route::any("order/index", [
  "as"   => "order/index",
  "uses" => "OrderController@indexAction"
]);

//-- Cart Route
Route::get('cart', 'OrderController@index');
Route::get('cart/add', 'OrderController@add_to_cart');
Route::get('cart/delete', 'OrderController@remove_from_cart');
Route::get('cart/edit', 'OrderController@update_cart');
Route::get('checkout', 'OrderController@checkout');
Route::get('checkout/mail', 'OrderController@checkout_mail');

//--Account Route
Route::post('account/new', 'accountController@create');
Route::get('account/update/{id}', 'accountController@update');
Route::get('account/destroy/{id}', 'accountController@destroy');

//--Category Route
Route::post('category/new', 'categoryController@create');
Route::get('category/update/{id}', 'categoryController@update');
Route::get('category/{id}/', [
    'as' => 'category', 'uses' => 'categoryController@show'
]);
Route::get('category/destroy/{id}', 'categoryController@destroy');

//--Product Route
Route::get('product/{id}/', [
    'as' => 'product', 'uses' => 'productController@show'
]);

Route::post('product/new', 'productController@create');
Route::post('product/comment', 'productController@comment');
Route::get('product/update/{id}', 'productController@update');
Route::get('product/destroy/{id}', 'productController@destroy');

Route::get('search', 'productController@product_search');
Route::get('search/{id}', 'productController@page_search');
//--Image Upload 
Route::post('apply/upload', 'productController@upload');

Route::any("account/authenticate", [
  "as"   => "account/authenticate",
  "uses" => "AccountController@authenticateAction"
]);
//---------------
Route::any("product/index", [
  "as"   => "product/index",
  "uses" => "ProductController@index"
]);
//---Contact-----
Route::get('contact', function()
{
    return view('contact');
});
Route::get('about', function()
{
    return view('about');
});

Route::get('newsletter', 'OrderController@newsletter');

