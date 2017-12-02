<?php
class App {
    
    private $result = NULL;


    public function __construct(){
        // Запускаем сессию
        Session::init();
    }

    public function init(){

        $routesFile = ROOT.'/config/routes.php';

        Router::load($routesFile)
            ->direct(Request::uri(), REQUEST::method());

    }
}
