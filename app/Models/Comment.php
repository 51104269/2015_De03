<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Account;
class Comment extends Model {

	protected $table = "comment";
	protected $guarded = ["id"];
	protected $softDelete = true;
	
	public static function load_Comments($product_id){
	   $comments = Comment::where('product_id', '=', $product_id)->get();
       $arr = array();
       foreach ($comments as $item)
       {
            $acc = Account::find($item->account_id);
			array_push($arr,array("email" => $acc->email,
								  "content" =>  $item->content,
								  ));
        }
		return $arr;
	}

}
