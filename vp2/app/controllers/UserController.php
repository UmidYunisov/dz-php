<?php
namespace App\Controllers;

use App\Core\View;
use App\Models\User;

class UserController
{
    public function index()
    {
        $view = new View();
        echo $view->generate('login.php', array('title'=>'Домашняя задания','errors'=>$errors));
    }
    public function login()
    {
        $data = $_POST;
        if(isset($data['submit']))
        {
            $errors = array();
            $user = User::where('login',$data['login'])->first();
            if($user)
            {
                if(password_verify($data['password'], $user->password))
                {
                  $_SESSION['logged_user'] = $user;
                  header('Location: /');
                }
                else
                {
                  $errors[] = 'Не верно введен пароль!';
                }
            }
        }
        else
          {
            $errors[] = 'Пользователь с таким логином не найден!';
          }
        $view = new View();
        echo $view->generate('login.php', array('title'=>'Авторизация','errors'=>array_shift($errors)));
    }
    
    public function logout()
    {
        unset($_SESSION["logged_user"]);
        session_destroy();
        header("Location: /");
        return true;
    }
    
}