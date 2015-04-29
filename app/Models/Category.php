<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\ProdCat;
class Category extends Model {

	protected $table = "category";
	protected $guarded = ["id"];
	protected $softDelete = true;
	
	public function products() {
		return $this->hasMany("Product");
	}
	
	public static function productList($id) {
		$arr = array();
		foreach(ProdCat::all() as $prod){
			if ($prod->category_id == $id) {
				$product = Product::find($prod->product_id);
				array_push($arr,$product);
			}
		}
		return $arr;
	}
	
	public static function male_products() {
		$arr = array();
		foreach(Category::all() as $cat){
			if (strpos($cat->name,'Nam') == true) {
				array_push($arr,array("id" => $cat->id,
									  "name" => $cat->name));
			}
		}
		return $arr;
	}
	
	public static function female_products() {
		$arr = array();
		foreach(Category::all() as $cat){
			if ((strpos($cat->name,'Nữ') != false) || (strpos($cat->name,'Đầm') != false)) {
				array_push($arr,array("id" => $cat->id,
									  "name" => $cat->name));
			}
		}
		return $arr;
	}
	
	public static function bestSeller() {
		$arr = array();
		$id = 0;
		foreach(Category::all() as $cat){
			if ( $cat->name == 'bestSeller' ) {
				$id = $cat->id;
				break;
			}
		}
		foreach(ProdCat::all() as $prod){
			if ($prod->category_id == $id) {
				$product = Product::find($prod->product_id);
				array_push($arr,$product);
			}
		}
		
		return $arr;
	}
	
	public static function newProduct() {
		$arr = array();
		$id = 0;
		foreach(Category::all() as $cat){
			if ( $cat->name == 'newProduct' ) {
				$id = $cat->id;
				break;
			}
		}
		foreach(ProdCat::all() as $prod){
			if ($prod->category_id == $id) {
				$product = Product::find($prod->product_id);
				array_push($arr,$product);
			}
		}
		
		return $arr;
	}
	
	public static function sale() {
		$arr = array();
		$id = 0;
		foreach(Category::all() as $cat){
			if ( $cat->name == 'sale' ) {
				$id = $cat->id;
				break;
			}
		}
		foreach(ProdCat::all() as $prod){
			if ($prod->category_id == $id) {
				$product = Product::find($prod->product_id);
				array_push($arr,$product);
			}
		}
		
		return $arr;
	}
	
	public static function violet() {
		$arr = array();
		$id = 0;
		foreach(Category::all() as $cat){
			if ( $cat->name == 'violet' ) {
				$id = $cat->id;
				break;
			}
		}
		foreach(ProdCat::all() as $prod){
			if ($prod->category_id == $id) {
				$product = Product::find($prod->product_id);
				array_push($arr,$product);
			}
		}
		
		return $arr;
	}

}
