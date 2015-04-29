<?php namespace App\Http\Controllers;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Account;
use Response;
class AccountController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}
	public function signup()
	{   
		$account =  new Account;
		if($account->checkEmail($_POST['email'])){
			$acc = Account::create([
				"email"    => $_POST['email'],
				"password" => bcrypt($_POST['password']),
				"group"    => $_POST['account-type']
			]);
			Auth::loginUsingId($acc->id);
			return Response::json([
					"status"  => 'ok'
				]);	
				
		}		
		else
			return Response::json([
					"status"  => 'fail'
				]);	
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	 public function logout()
	{	
		Auth::logout();
		return redirect('/');
	}
	
	 public function login()
	{
		$credentials = [
		  "email"    => $_POST["email"],
		  "password" => $_POST["password"],
		  "group"    => "user"
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
	
	public function loginView(){
		
		return view('login');
	}
	
	public function signupView(){
		
		return view('signup');
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{   
		$account =  new Account;
		if($account->checkEmail($_POST['email'])){
			Account::create([
				"email"    => $_POST['email'],
				"password" => bcrypt($_POST['password']),
				"group"    => $_POST['account-type']
			]);
			return Response::json([
					"status"  => 'ok'
				]);
				
		}		
		else
			return Response::json([
					"status"  => 'fail'
				]);	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{	
		$accList = Account::all();
		foreach($accList as $acc){
			if($acc->email == $id ){
				$acc->group = $_GET['group'];
				$acc->save();
				break;
			}
		}
		return Response::json([
					"status"  => "ok"
				]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$accList = Account::all();
		foreach($accList as $acc){
			if($acc->email == $id ){
				$acc->delete();
				break;
			}
		}
		return Response::json([
					"status"  => "ok"
				]);
	}
	
	public function authenticateAction()
	{
		$credentials = [
		  "email"    => Input::get("email"),
		  "password" => Input::get("password")
		];
		if (Auth::attempt($credentials))
		{
		  return Response::json([
			"status"  => "ok",
			"account" => Auth::user()->toArray()
		  ]);
		}
		return Response::json([
		  "status" => "error"
		]);
	}

}
