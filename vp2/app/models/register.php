<?php
namespace App\Models;

use App\Models\User;

class Register extends User
{


	public static function add_user($login, $pass1, $name, $born, $descr, $photoname)
	{
		$user = new User;
		$user->login = $login;
		$user->password = password_hash($pass1, PASSWORD_DEFAULT);
		$user->name = $name;
		$user->age = $born;
		$user->description = $descr;
		$user->photo = $photoname;
		$user->save();
	}
}