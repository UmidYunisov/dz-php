<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class FileController
{
	public function index()
	{
		if(!$_SESSION['logged_user'])
        {
            header('Location: /');
        }
        else
        {
			$result = User::all();
			$view = new View;
			echo $view->generate('filelist.php',array('title'=>'Список файлов','result'=>$result));
		}
	}
	
}