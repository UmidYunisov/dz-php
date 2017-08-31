<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\User;


class MainController
{
    function __construct()
    {
       
    }
    public function Index()
    {
        $view = new View();
		echo $view->generate('index.php', array('title'=>'Домашняя задания'));
    }
    
}