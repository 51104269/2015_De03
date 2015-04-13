<?php 
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
class Account extends Eloquent implements AuthenticatableContract, CanResetPasswordContract
{
	protected $table = "account";
	protected $hidden = ["password"];
	protected $guarded = ["id"];
	protected $softDelete = true;
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}
	public function getAuthPassword()
	{
		return $this->password;
	}
	public function getReminderEmail()
	{
		return $this->email;
	}
	public function orders()
	{
		return $this->hasMany("Order");
	}
	
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return 'remember_token';
	}
	public function getEmailForPasswordReset()
	{
		return "";
	}
	public function checkEmail($email)
	{	
		$accList = $this::all();
		foreach ($accList as $acc)
		{
			if($acc->email == $email){
				return false;
			}
		}
		return true;
		
	}
}
