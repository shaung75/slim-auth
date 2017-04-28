<?php

namespace App\Auth;

use App\Models\User;

class Auth
{
	public function user()
	{
		return User::find($_SESSION['user']);
	}

	public function check()
	{
		return isset($_SESSION['user']);
	}

	public function check_admin()
	{
		return $_SESSION['level'] == 1;
	}

	public function attempt($email, $password)
	{
		$user = User::where('email', $email)->first();

		if(!$user) {
			return false;
		}

		if(password_verify($password, $user->password)) {
			$_SESSION['user'] = $user->id;
			$_SESSION['level'] = $user->level;
			return true;
		}
		
		return false;
	}

	public function logout()
	{
		unset($_SESSION['user']);
		unset($_SESSION['level']);
	}
}