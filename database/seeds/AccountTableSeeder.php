<?php

class AccountTableSeeder extends DatabaseSeeder {
	
	public function run()
	{
		$faker = $this->getFaker();
		$input = array("admin","user");
		for ($i = 0; $i < 10; $i++)
		{
		  $email     = $faker->email;
		  $password  = Hash::make("password");
		  $rand_keys = rand(0,1);
		  $group 	 = $input[$rand_keys];
		  Account::create([
			"email"    => $email,
			"password" => $password,
			"group"    => $group
		  ]);
		}
	}
}
