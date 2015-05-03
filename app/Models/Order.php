<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderItem;
use App\Product;

class Order extends Model {
	protected $table = "order";
	protected $guarded = ["id"];
	protected $softDelete = true;
	public function account()
	{
		return $this->belongsTo("Account");
	}
	public function orderItems()
	{
		return $this->hasMany("OrderItem");
	}
	public function products()
	{
		return $this->belongsToMany("Product", "order_item");
	}
	public static function add_to_Cart($order_id,$product_id,$quantity,$price){
		foreach(OrderItem::all() as $item){
			if($item->order_id == $order_id && $item->product_id == $product_id ){
				$item->quantity += $quantity;
				$item->price += $price;
				$item->save();
				return;
			}
		}
		OrderItem::create([
				"order_id"    => $order_id,
				"product_id" => $product_id,
				"quantity"    => $quantity,
				"price" => $price
			]);
	}
	public static function remove_from_Cart($order_id,$product_id){
		foreach(OrderItem::all() as $item){
			if($item->order_id == $order_id && $item->product_id == $product_id){
				$item->delete();
				break;
			}
		}
	}
	public static function update_Cart($order_id,$product_id,$quantity,$price){
		foreach(OrderItem::all() as $item){
			if($item->order_id == $order_id && $item->product_id == $product_id){
				$item->quantity += $quantity;
				$item->price += $price;
				$item->save();
				break;
			}
		}
	}
	public static function delete_Cart($order_id){
		foreach(Order::all() as $order){
			if($order->id == $order_id){
				
				foreach(OrderItem::all() as $item){
					if($item->order_id == $order->id)
						$item->delete();
				}
				$order->delete();
				break;
			}
		}
	}
	public static function get_Cart($order_id){
	   $items = OrderItem::where('order_id', '=', $order_id)->get();
       $arr = array();
       foreach ($items as $item)
       {
            $product = Product::find($item->product_id);
			array_push($arr,array("product" => $product,
								  "price" =>  $item->price,
								  "quantity" => $item->quantity));
        }
		return $arr;
	}
	public static function number_items($order_id) {
		$count = 0;
		$items = OrderItem::where('order_id', '=', $order_id)->get();
		foreach($items as $item)
			$count = $count + $item->quantity;	
		return $count;
	}
	
	public static function last_product($order_id) {
		$items = OrderItem::where('order_id', '=', $order_id)->get();
		$product = null;
		if(count($items)>0){
			$item = $items[count($items)-1];
			$product = Product::find($item->product_id); 
		}
		return $product;
	}
	public static function total_price($order_id) {
		$items = OrderItem::where('order_id', '=', $order_id)->get();
		$count = 0;
		foreach($items as $item)
			$count = $count + $item->price;	
		return $count;
	}
}
