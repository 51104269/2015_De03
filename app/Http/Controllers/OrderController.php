<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use Cookie;
use Response;
use Illuminate\Cookie\CookieJar;
use Illuminate\Http\Request;

class OrderController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('cart');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add_to_cart(){
		$id = 0;
		if(Cookie::get('cart') == false){
			$ord = Order::create(["account_id"  => 0]);
			Cookie::queue('cart', $ord->id);				
			$id = $ord->id;
		}
		else $id = Cookie::get('cart');
		Order::add_to_Cart($id,$_GET['id'],$_GET['quantity'],$_GET['price']);
		return Response::json([
					"status"  => 'ok'
				]);
	}
	
	public function remove_from_cart(){
		$id = Cookie::get('cart');
		Order::remove_from_Cart($id,$_GET['id']);
		return Response::json([
					"status"  => 'ok'
				]);
	}
	
	public function update_cart(){
		$id = Cookie::get('cart');
		Order::update_Cart($id,$_GET['id'],$_GET['quantity'],$_GET['price']);
		return Response::json([
					"status"  => 'ok'
				]);
	}
	
	public function create()
	{
		//
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
