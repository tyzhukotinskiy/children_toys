<?php
	namespace main\components;

	class Router{
		private $routes;

		public function __construct(){
			$path = ROOT.'/config/routes.php';
			$this->routes = require_once($path);
		}

		public function getURI(){
			if(!empty($_SERVER['REQUEST_URI'])){
				$uri = $_SERVER['REQUEST_URI'];
				return $uri;
			}
		}

		public function run(){
			$uri = $this->getURI();

			foreach($this->routes as $uriPattern => $path){
				if(preg_match("~$uriPattern~", $uri)){
					$route = preg_replace("~$uriPattern~", $path, $uri);
					$route_parts = array_diff(explode('/', $route), array(''));
					array_shift($route_parts);

					$controller_name = ucfirst(array_shift($route_parts).'Controller');
					$action_name = 'action'.ucfirst(array_shift($route_parts));

					$params = (count($route_parts)>0)?$route_parts:array();
					$controller_path = "\\main\\controllers\\".$controller_name;
					$controller_object = new $controller_path();

					if(count($params)>0)call_user_func_array(array($controller_object, $action_name), $params);
					else $controller_object->$action_name();
					break;
				}
			}
		}
	}
?>