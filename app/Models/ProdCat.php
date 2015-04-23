<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdCat extends Model {

	protected $table = "prodcat";
	protected $guarded = ["id"];
	protected $softDelete = true;

}
