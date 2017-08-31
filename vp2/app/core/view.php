<?php
namespace App\Core;

use Twig_Environment;
use Twig_Loader_Filesystem;

class View {
    private $twig;
    function __construct()
    {
        $loader = new Twig_Loader_Filesystem('templates');
        $twig = new Twig_Environment($loader);
        $twig->addGlobal('session', $_SESSION);
        $this->twig = $twig;
    }
    /*function generate($content_view, $template_view, $data = null){
        include 'app/views/'.$template_view;
    }*/
    function generate($content_view, $data = null){
        echo $this->twig->render($content_view, $data);
    }
}