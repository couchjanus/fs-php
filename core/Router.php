<?php

class Router
{
	public $routes = [
		'GET' => [],
		'POST' => []
	];

	public static function load($file)
	{
		$router = new static;
		require $file;
		return $router;
	}

	public function define($routes)
	{
		$this->routes = $routes;
	}

	
	public function get($uri, $controller)
	{
		$this->routes['GET'][$uri] = $controller;
	}

	public function post($uri, $controller) {
		$this->routes['POST'][$uri] = $controller;
	}

	private function getPathAction($route){

		list($segments, $action) = explode('@', $route);

		$segments = explode('\\', $segments);
		$controller = array_pop($segments);
		$controllerFile = '/';
		do {
		    if(count($segments)==0){
		      return array ($controller, $action, $controllerFile);
			    }
			    else{
			        $segment = array_shift($segments);
			        $controllerFile = $controllerFile.$segment.'/';
			    }
			}while ( count($segments) >= 0);

	}

	private function getPath($segments){
		$segments = explode('\\', $segments);
		$controller = array_pop($segments);
		$controllerFile = '/';
		do {
		    if(count($segments)==0){
		      return array ($controller, $controllerFile);
			    }
			    else{
			        $segment = array_shift($segments);
			        $controllerFile = $controllerFile.$segment.'/';
			    }
			}while ( count($segments) >= 0);

	}

	public function direct($uri, $requestType)
	{   

		if (array_key_exists($uri, $this->routes[$requestType])) {
			
			return $this->callAction(
			...$this->getPathAction($this->routes[$requestType][$uri])
			);
		}else{
		
			foreach ($this->routes[$requestType] as $key => $val){
				$pattern = preg_replace('#\(/\)#', '/?', $key);
				$pattern = "@^" .preg_replace('/{([a-zA-Z0-9\_\-]+)}/', '(?<$1>[a-zA-Z0-9\_\-]+)', $pattern). "$@D";
				preg_match($pattern, $uri, $matches);
				array_shift($matches);
				if($matches){
					$getAction = explode('@', $val);
					list($controller, $controllerFile) = $this->getPath($getAction[0]);
					return $this->callAction($controller, $getAction[1], $controllerFile, $matches);
				}
			}
		}
		throw new Exception('No route defined for this URI.');
	}

	protected function callAction($controller, $action, $controllerFile, $vars = []) // add $vars = [] in case $vars is empty
	{
		
		include(CONTROLLERS.'/'.$controllerFile.'/'.$controller.'.php');
		
		$controller = new $controller;
		
		if (! method_exists($controller, $action)) {
			throw new Exception(
			"{$controller} does not respond to the {$action} action."
			);
		}
		return $controller->$action($vars); // return $vars to the action
	}

}