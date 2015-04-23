<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductcategory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("prodcat", function($table)
		{
			$table->engine = "InnoDB";
			$table->increments("id");
			$table->integer("product_id");
			$table->integer("category_id");
			$table->dateTime("created_at");
			$table->dateTime("updated_at");
			$table->dateTime("deleted_at");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists("prodcat");
	}

}
