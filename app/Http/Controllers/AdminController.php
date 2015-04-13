<?php namespace App\Http\Controllers;
use Auth;
use Response;
class AdminController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Admin Controller
	|--------------------------------------------------------------------------
	| Created to control administration functions 24/03/2015 
	*/

	/**
	 * Show the application Administration screen to the Administrators.
	 *
	 * @return Response
	 */
	public function index()
	{	if (Auth::check())
			return view('admin',['check' => true]);
		else 
			return view('admin',['check' => false]);
	}
	
	/**
	 * 
	 *
	 * @return Response
	 */
	public function logout()
	{	Auth::logout();
		return redirect('/admin');
	}
	/**
	 *
	 *
	 * @return Response
	 */
	public function login()
	{
		$credentials = [
		  "email"    => $_POST["email"],
		  "password" => $_POST["password"],
		  "group"    => "admin"
		];
		$remember = (array_key_exists('remember', $_POST)) ? true : false;
		
		if (Auth::attempt($credentials, $remember)) 
		{ 		 
			return Response::json([
				"status"  => "ok",
			]);
		}	
		return Response::json([
		    "status" => "invalid"
		]);
		
	}

}