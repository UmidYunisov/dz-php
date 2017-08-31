<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class ListController
{
	public function index()
	{
		if(!$_SESSION['logged_user'])
        {
            header('Location: /');
        }
        else
        {
            $list = User::all();
            foreach($list as &$value)
            {
            	$value->age = User::calculate_age($value['age']);
            }
            $view = new View();
            echo $view->generate('list.php', array('title'=>'Список пользователей', 'list'=>$list));
        }
	}
	public function delete($id)
	{
		if($_SESSION['logged_user'])
		{
			if (!filter_var($id, FILTER_VALIDATE_INT) === false)
			{
				$res = User::where('id','=',$id)->first();
				$img = $res->photo;
				User::where('id', '=', $id)->delete();
				unlink($img);
				header('Location: /list');
			}
			else
			{
				throw new Exception('Не правильные данные');
			}
		}
		else
			header('Location: /');
	}
}