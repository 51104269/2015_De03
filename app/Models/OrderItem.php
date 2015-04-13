<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {

	protected $table = "order_item";
	protected $guarded = ["id"];
	protected $softDelete = true;
	public function product()
	{
		return $this->belongsTo("Product");
	}
	public function order()
	{
		return $this->belongsTo("Order");
	}
}
