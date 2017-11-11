<?php
/**
 * @return string текущий адрес запроса
 */
$result = null;

function getURI(){
    if (isset($_SERVER['REQUEST_URI']) and !empty($_SERVER['REQUEST_URI']))
        return trim($_SERVER['REQUEST_URI'], '/');
}

//получаем строку запроса
$uri = getURI();

function direct($routes, $uri)
    {
      // Проверить наличие такого запроса в routes.php
        if (array_key_exists($uri, $routes)) {
            // Определить контроллер
            return $routes[$uri];
        }
        echo('No route defined for this URI.');
    }

$routes = include(realpath(__DIR__).'/./routes.php');

$controllerName = direct($routes, $uri);

//Подключаем файл контроллера

$controllerFile = realpath(__DIR__).'/../controllers/' . $controllerName . "Controller.php";

// $controllerFile = CONTROLLERS . $controllerName . "Controller.php";

if(file_exists($controllerFile)){
    include_once($controllerFile);
    $result = true;
}
