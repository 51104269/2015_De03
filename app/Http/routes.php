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

Route::any("category/index", [
  "as"   => "category/index",
  "uses" => "CategoryController@index"
]);

Route::any("order/index", [
  "as"   => "order/index",
  "uses" => "OrderController@indexAction"
]);

//--Account Route
Route::post('account/new', 'accountController@create');
Route::get('account/update/{id}', 'accountController@update');
Route::get('account/destroy/{id}', 'accountController@destroy');

//--Category Route
Route::post('category/new', 'categoryController@create');
Route::get('category/update/{id}', 'categoryController@update');
Route::get('category/destroy/{id}', 'categoryController@destroy');

//--Product Route
Route::post('product/new', 'productController@create');
Route::get('product/update/{id}', 'productController@update');
Route::get('product/destroy/{id}', 'productController@destroy');

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



