<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\User;
use App\Models\Register;

class RegisterController
{
	public function index()
	{
		$view = new View();
		echo $view->generate('reg.php', array('title'=>'Регистрация'));
	}
	public function reg()
	{
		$data = $_POST;
		if(isset($data['submit']))
		{
		  $errors = array();

		  if(trim($data['login']) === '')
		  {
		    $errors[] = 'Введите логин!';
		  }
		  if(trim($data['pass1']) === '')
		  {
		    $errors[] = 'Введите пароль!';
		  }
		  if(trim($data['pass2']) === '')
		  {
		    $errors[] = 'Введите повторный пароль!';
		  }
		  if($data['pass1'] != $data['pass2'])
		  {
		    $errors[] = 'Повторный пароль введен не верно!';
		  }
		  if(isset($_FILES['photo']))
		  {
		    if($_FILES['photo']['name'] == '')
		    {
		      $errors[] = 'Вы не выбрали файл.';
		    }
		    $getMime = explode('.', $_FILES['photo']['name']);
		    $mime = strtolower(end($getMime));
		    $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
		    if(!in_array($mime, $types))
		    {
		      $errors[] = 'Недопустимый тип файла.';
		    }
		  }
		  $res = User::where('login','=',$data['login'])->count();
		  
		  if($res !== 0)
		  {
		    $errors[] = 'Пользователь с таким логином уже существует!';
		  }
		  if(trim($data['name']) === '')
		  {
		    $errors[] = 'Введите имя!';
		  }

		  if(empty($errors))
		  {
		    $photoname = 'templates/img/'.$_FILES['photo']['name'];
		    copy($_FILES['photo']['tmp_name'], $photoname);
		    Register::add_user($data['login'],$data['pass1'],$data['name'],$data['born'],$data['descr'],$photoname);
		    $success = true;
		  }
		
		$view = new View();
		echo $view->generate('reg.php', array('title'=>'Регистрация','errors'=>array_shift($errors),'data'=>$data, 'success'=>$success));
		}
		
	}
}