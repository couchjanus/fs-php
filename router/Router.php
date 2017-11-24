<?php
/**
 * @return string текущий адрес запроса
 */

define('ROUTES',
        include(realpath(__DIR__).'/./routes.php'));

$result = null;

function getURI(){
    if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
        return trim($_SERVER['REQUEST_URI'], '/');
}

function direct($uri)
    {
      // Проверить наличие такого запроса в routes.php
        if (array_key_exists($uri, ROUTES)) {
            return ROUTES[$uri];
        }
        Throw new Exception('No route defined for this URI.');
    }

//получаем строку запроса

$uri = getURI();
$direct = direct($uri);

// 

list($segments, $action) = explode('@', $direct);

$segments = explode('\\', $segments);
// 
$controller = array_pop($segments);

$controllerFile = '/';

do {
    if(count($segments)==0){
       $controllerFile = realpath(__DIR__).'/../controllers'.$controllerFile.$controller . ".php";
       break;
    }
    else{
        $segment = array_shift($segments);
        $controllerFile = $controllerFile.$segment.'/';

    }
}while ( count($segments) >= 0);

//Подключаем файл контроллера

try{
	 include_once($controllerFile);
	 $controller = new $controller;
	 if (!method_exists($controller, $action)) {
	  		throw New Exception(
	  			"{$controller} does not respond to the {$action} action"
	  		);
	 }
	 $controller->$action();
	 $result = true;
} catch (Exception $e){
	$result = false;
	echo 'Выброшено исключение: ',  $e->getMessage(), "\n";

} finally{
	return  $result;
}
