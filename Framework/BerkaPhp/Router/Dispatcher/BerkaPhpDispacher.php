<?php
namespace BerkaPhp\Router\Dispatcher;

use BerkaPhp\Helper\Debug;
use Config\Router\Router;

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
		$this->routes = array
        (
            'routes'=>array(),
            'setup' => array(
                'prefix'=>array()
            )

        );
	}

	public function route($path, $call_back) {
		$route = ['path'=> $path, 'callBack'=> $call_back];
		array_push($this->routes['routes'], $route);
	}

    public function prefix($prefixArray, $option) {
        $prefix = ['prefixes'=> $prefixArray, 'options'=> $option];
        if(sizeof($this->routes['setup']['prefix']) ==  0)
            $this->routes['setup']['prefix'] = $prefix;
    }

    public function addPrefix($name, $prefix) {
        if(sizeof($this->routes['setup']['prefix']) >  0)
            $this->routes['setup']['prefix']['prefixes'][$name] = $prefix;
    }

	public function start() {

	    //Debug::PrintOut($this->routes['setup']['prefix']['prefixes']);
		$routeObject = $this->filterUrl();
		$foundRequestPath = false;
		$defaultRoute = null;

		if (sizeof($this->routes['routes']) > 0) {
			foreach($this->routes['routes'] as $route) {
				if(isset($routeObject["controller"] ) && $routeObject["controller"] == trim(str_replace("/","",$route['path']))) {
					if (is_callable($route['callBack'])) {
						$foundRequestPath = true;
						call_user_func($route['callBack'], $routeObject);
						break;
					}
				}
                if(isset($routeObject["prefix"]['name'] ) && strtolower($routeObject["prefix"]['name']) == strtolower(trim(str_replace("/","",$route['path'])))) {
                    if (is_callable($route['callBack'])) {
                        $foundRequestPath = true;
                        call_user_func($route['callBack'], $routeObject);
                        break;
                    }
                }
                else if($route['path'] == '/') {
                    $defaultRoute = $route;
				}
			}

			if (!$foundRequestPath && $defaultRoute != null) {
				call_user_func($defaultRoute['callBack'], $routeObject);
			}
		}
	}

	private function getMethod() {
		return $this->server_object['REQUEST_METHOD'];
	}

    /**
     * @return array
     * @throws \Exception
     */
    private function filterUrl() {

        $quested = array(
            'domain'=>$this->server_object["SERVER_NAME"],
            'prefix'=>[
                'name'=>'',
                'object'=>null,
                'isDefault'=>false
            ],
            'controller'=>'',
            'action'=>'',
            'args' =>[
                'params'=>array(),
                'query'=>array()
            ],
            'resources'=>[
                'view'=>[
                    'path'=>'Views/{{prefix}}/{{controller}}/{{name}}'
                ],
                'controller'=>[
                    'path'=>'Controllers/{{prefix}}/{{name}}Controller.php',
                    'namespace'=>'Controller\\{{prefix}}\\{{name}}Controller'
                ],
                'model'=>[
                    'path'=>'Models/',
                    'namespace'=>'Model\\{{name}}Model'
                ],
                'template'=>[
                    'path'=>'Views/{{prefix}}/Layout/layout'
                ]
            ]
        );

        $quested['args']['query'] = isset($_GET) ? $_GET : array();

		$url = explode('/', $this->server_object["REQUEST_URI"]);
		array_shift($url);

		$prefix = isset($this->routes['setup']['prefix']['prefixes']) ? $this->routes['setup']['prefix']['prefixes'] : array();
		$option = isset($this->routes['setup']['prefix']['options']) ? $this->routes['setup']['prefix']['options'] : array();

        if(sizeof($prefix) == 0)
            throw new \Exception('router requires at least one prefix to be set');

		if(!isset($option['default']) || empty($option['default']))
		    throw new \Exception('default router prefix was not set');

        $index = 1;
        $containsPrefix = true;

		if(sizeof($prefix) > 0)
        {

            $key = '';

            if(key_exists($url[0], $prefix))
                $key = $url[0];

            if(empty($key)){

                $index = 0;
                $containsPrefix = false;

                $key = $option['default'];

                $quested['prefix']['isDefault'] = true;

                if(empty($key))
                    throw new \Exception('Empty default prefix , default prefix should be assign to an existing prefix'.$key);

                if(!array_key_exists($key, $prefix))
                    throw new \Exception('Invalid default prefix ,{'.$key.'} not found in prefix setup');

            }

            $quested['prefix']['object'] = $prefix[$key];

            if(isset($prefix[$key]['name']) && !empty($prefix[$key]['name']))
            {
                $name = $prefix[$key]['name'];
                $quested['prefix']['name'] = ucfirst($name);
            }
            else if(!isset($prefix[$key]['name']))
            {
                $quested['prefix']['name'] = ucfirst($key);
            }


        }

		for ($i = $index; $i < count($url) ; $i++) {

			if ($i ==  $index) {

                if(strpos($url[$i],'?')) {

                    $controllerWithQuery = explode('?', $url[$i]);
                    $quested['controller'] = $controllerWithQuery[0];

                }
                else
                    $quested['controller'] = $url[$i];

			} elseif ($i ==  $index + 1) {

			    if(strpos($url[$i],'?'))
                {

                    $actionWithQuery  = explode('?', $url[$i]);
                    $quested['action'] = $actionWithQuery[0];

                }
                else
                    $quested['action'] = $url[$i];

			} else {

                if(strpos($url[$i],'?')) {

                    $paramWithQuery = explode('?', $url[$i]);
                    $quested['args']['params'][] = $paramWithQuery[0];

                }
                else
                    $quested['args']['params'][] = $url[$i];
			}
		}

		return $quested;
	}

}



?>