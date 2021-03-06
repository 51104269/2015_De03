<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\ProdCat;
use App\Category;
use App\Comment;
use Response;
use Validator;
use Redirect;
use Input;
use Session;
use Illuminate\Http\Request;

class ProductController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$query    = Product::with(["category"]);
		$category = Input::get("category");
		if ($category)
		{
			$query->where("category_id", $category);
		}
		return $query->get();
	
	}
	
	public function product_search() {
	
		//$arr_name = Product::where('name', 'LIKE', $_GET['value'])->get()->toArray(); 
		//$arr_desc = Product::where('description', 'LIKE', $_GET['value'])->get()->toArray();
		
		$result = array();
		$value = $_GET['value'];
		foreach(Product::all() as $prod){
			if($value != '')
			   if( strpos((strtolower($prod->name)),(strtolower($value)))!==false || strpos(strtolower($prod->description),strtolower($value)) !==false)
				  array_push($result,$prod);	
		}
		$res = '';
		if(count($result) == 0) 
			$res = "<li>Không có sản phẩm tương ứng</li>";
		else {
			foreach($result as $product){
				$res .= "<li><a href=\"{$_GET['src']}product\\{$product['id']}\"><img src=\"{$_GET['src']}{$product['url']}\" width='50' height='50'>{$product['name']}</a></li>";
			}
		}
		return Response::json([
					"status"  => $res
				]);	
	}
	
	public function page_search($value) {
	
		//$arr_name = Product::where('name', 'LIKE', $value)->get()->toArray(); 
		//$arr_desc = Product::where('description', 'LIKE', $value)->get()->toArray();
		//$result = $arr_name + $arr_desc;
		$result = array();
		foreach(Product::all() as $prod){
			if($value != '')
			   if( strpos((strtolower($prod->name)),(strtolower($value)))!==false || strpos(strtolower($prod->description),strtolower($value)) !==false)
				  array_push($result,$prod);	
		}
		return view('search',['value' => $value,
								'products' => $result]);
			
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		Product::create([
				"name"        => $_POST['name'],
				"url"         => $_POST['url'],
				"description" => $_POST['description'],
				"price"    	  => $_POST['price'],
				"category_id" => 1	
		]);
			
		$product_id = Product::orderBy('created_at', 'desc')->first()->id;
		if(!empty($_POST['category_list'])) {
			foreach($_POST['category_list'] as $cat_id) {
				ProdCat::create([
				"product_id"  => $product_id,
				"category_id" => $cat_id	
				]);
			}
		}
			
		return Response::json([
					"status"  => 'ok'
				]);	
	}
	public function comment()
	{
		Comment::create([
				"product_id"  => $_POST['product_id'],
				"account_id"  => $_POST['account_id'],
				"content" => $_POST['content'],	
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
	 * Image Upload.
	 *
	 * @return Response
	 */
	public function upload()
	{
		$file = array('image' => Input::file('image'));
		$rules = array('image' => 'required');
		$validator = Validator::make($file, $rules);
		if ($validator->fails()) {
			Session::flash('error', 'File Upload Không phải là file ảnh');
			return Redirect::to('admin');
		}
		else {
			// checking file is valid.
			if (Input::file('image')->isValid()) {
				$destinationPath = 'uploads'; 
				$extension = Input::file('image')->getClientOriginalExtension(); 
				$fileName = rand(11111,99999).'.'.$extension;
				Input::file('image')->move($destinationPath, $fileName); 
				Session::flash('success', 'Upload Thành Công'); 
				return Redirect::to('admin');
			}
			else { 
				Session::flash('error', 'Upload Bị Lỗi');
				return Redirect::to('admin');
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::find($id);
		$arr = array();
		$cat_id = 0;
		foreach(ProdCat::all() as $prod){
			if ($prod->product_id == $id) {
					$cat_id = $prod->category_id;
			}
		}
		foreach(ProdCat::all() as $prod){
			if ($prod->category_id == $cat_id) {
				$product_arr = Product::find($prod->product_id);
				array_push($arr,$product_arr);
			}
		}
		
		return view('product',['product' => $product,
								'related_products' => $arr	]);
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
		
		$pro = Product::find($id);
		$pro->name = $_GET['name'];
		$pro->url = $_GET['url'];
		$pro->description = $_GET['desc'];
		$pro->price = $_GET['price'];
		$pro->category_id = 1;
		$pro->save();
		foreach(ProdCat::all() as $pc){
			if($pc->product_id == $id)
				$pc->delete();
		}
		if(!empty($_GET['category_list'])) {
			foreach($_GET['category_list'] as $cat_id) {
				ProdCat::create([
				"product_id"  => $id,
				"category_id" => $cat_id	
				]);
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
		foreach(ProdCat::all() as $pc){
			if($pc->product_id == $id)
				$pc->delete();
		}
		$pro = Product::find($id);
		$pro->delete();
		
		return Response::json([
					"status"  => "ok"
				]);
	}

}
