<?php
namespace berkaPhp\router\dispacher;

class BerkaPhpDispacher
{
	protected $method;
	protected $params;
	protected $controller;
	private $server_object;
	private $routes;

	function __construct($server)
	{
		$this->server_object = $server;
		$this->routes = array();
	}

	public function route($path, $call_back) {
		$route = ['path'=> $path, 'callBack'=> $call_back];
		array_push($this->routes, $route);
		$route_object = $this->filterUrl();
	}

	public function start() {

		$routeObject = $this->filterUrl();
		$foundRequestPath = false;
		$defaulRoute = null;
		
		if (isset($_GET)) {
			$routeObject["options"] = $_GET;
			if (isset($routeObject["params"])) {
				$params_ = explode("?", $routeObject["params"][0]);
				$routeObject["params"] = array_shift($params_);
			}
		}

		if (sizeof($this->routes) > 0) {
			foreach($this->routes as $route) {
				if($routeObject["controller"] == trim(str_replace("/","",$route['path']))) {
					if (is_callable($route['callBack'])) {
						$foundRequestPath = true;
						call_user_func($route['callBack'], $routeObject);
						break;
					}
				} else if($route['path'] == '/') {
					$defaulRoute = $route;
				}
			}

			if (!$foundRequestPath && $defaulRoute != null) {
				call_user_func($defaulRoute['callBack'], $routeObject);
			}
		}
	}

	private function getMethod() {
		return $this->server_object['REQUEST_METHOD'];
	}

	public function filterUrl() {

        $quested = "";

		$url = explode('/', $this->server_object["REQUEST_URI"]);
		array_shift($url);

        if(in_array(ucfirst($url[0]), \berkaPhp\config\prefixes())) {
            $index = 1;
            $quested['prefix'] = ucfirst($url[0]);
        } else {
            $index = 0;
            $quested['prefix'] = DEFAULT_PREFIX;
        }

		for ($i = $index; $i < count($url) ; $i++) {
				$quested['domain'] = $this->server_object["SERVER_NAME"];
			if ($i ==  $index) {

				$quested['controller'] = $url[$i];
			} elseif ($i ==  $index + 1) {
				$quested['action'] = $url[$i];
			} else {
				$quested['params'][] = $url[$i];
			}
		}

		return $quested;
	}

}



?>