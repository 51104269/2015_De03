<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	protected $faker;
	public function getFaker()
	{	
		if (empty($this->faker))
		{
		  $this->faker = Faker\Factory::create();
		}
		return $this->faker;
	}
	public function run()
	{
		Model::unguard();
		$this->call("AccountTableSeeder");
	}

}
