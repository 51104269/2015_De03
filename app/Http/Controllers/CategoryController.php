<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use Response;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Http\Request;

class CategoryController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Category::with(["products"])->get();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		Category::create([
				"name"    => $_POST['name']
			]);
		return Response::json([
					"status"  => 'ok'
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
		$cat = Category::find($id);
		$products = Category::productList($id);
		
		return view('category',['cat' => $cat,
								'products' =>  $products
								]);
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
		$cat = Category::find($id);
		$cat->name = $_GET['name'];
		$cat->save();
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
		$cat = Category::find($id);
		$cat->delete();
		
		return Response::json([
					"status"  => "ok"
				]);
	}

}
