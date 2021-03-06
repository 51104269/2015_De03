<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = "product";
	protected $guarded = ["id"];
	protected $softDelete = true;
	public function orders()
	{
		return $this->belongsToMany("Order", "order_item");
	}
	public function orderItems()
	{
		return $this->hasMany("OrderItem");
	}
	public function category()
	{
		return $this->belongsTo("Category");
	}
	
}
