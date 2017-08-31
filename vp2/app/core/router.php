<?php
class Route
{
	public static function Start()
	{
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		$controller_name = "MainController";
		$action_name = 'index';
		// получаем контроллер
		if (!empty($routes[1])) {
		    $controller_name = $routes[1].'Controller';
		}

		// получаем действие
		if (!empty($routes[2])) {
		    $action_name = $routes[2];
		}

		$filename = "App\Controllers\\".$controller_name.".php";
		try {
		    if (file_exists($filename)) {
		        require_once $filename;
		    } else {
		        throw new Exception("File not found");
		    }


		    $classname = 'App\Controllers\\'.$controller_name;
		    
		    if (class_exists($classname)) {
		        $controller = new $classname();
		    } else {
		        throw new Exception("File found but class not found");
		    }

		    if (method_exists($controller, $action_name)) {
		        if ( !empty($routes[3]) )
				{
				    $params= $routes[3];
				    $controller->$action_name($params);
				}
				else
		        $controller->$action_name();

		    } else {
		        throw new Exception("Method not found");
		    }
		} catch (Exception $e) {
			$view = new App\Core\View();
			$view->generate('errors/404.php', array('error'=>$e->getMessage()));
		}
	}
}