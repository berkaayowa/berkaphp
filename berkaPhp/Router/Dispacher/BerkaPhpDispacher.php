<?php
namespace berkaPhp\router\dispacher;

class BerkaPhpDispacher
{
	protected $method;
	protected $params;
	protected $controller;
	private $server_object;

	function __construct($server)
	{
		$this->server_object = $server;
	}

	public function route($path, $call_back) {

		$route_object = $this->filterUrl();

		if (isset($_GET)) {
			$route_object["options"] = $_GET;
			if (isset($route_object["params"])) {
				$params_ = explode("?", $route_object["params"][0]);
				$route_object["params"] = array_shift($params_);
			}
		}

		if($route_object["controller"] == trim(str_replace("/","",$path))) {
			if (is_callable($call_back)) {
				call_user_func($call_back, $route_object);
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