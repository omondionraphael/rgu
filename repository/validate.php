<?php 

class Validate
{
	public function validateAddUser($POST)
	{
		$fullName = $POST["fullname"];
		$email = $POST["email"];
		$password = $POST["password"];

		if(!empty($fullName) && !empty($email) && !empty($password))
		{
			return true;
		}
		else
		{
			return false;
		}
	}



	public function validateLoginCredentials($POST)
	{
		$email = $POST["email"];
		$password = $POST["password"];

		if(!empty($email) && !empty($password))
		{
			return true;
		}
		else
		{
			return false;
		}


	}


}