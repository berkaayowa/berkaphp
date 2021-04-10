<?php
namespace BerkaPhp\Router\Dispatcher;

use BerkaPhp\Helper\Debug;
use Config\Router\Error;

class Route
{

	function __construct()
	{
		# code...
	}

    /**
     * @param $object
     */
    public static function to($object) {

		if($object != null) {

			if(!empty($object['controller']))
                $controller = ucfirst(strtolower($object['controller']));
			else{

			    if(!isset($object['prefix']['object']['home']))
			        throw new \Exception('Default controller for {'.$object['prefix']['name'].'} prefix is not set');

                $controller = ucfirst(strtolower($object['prefix']['object']['home']));

            }

            $controller_class = str_replace('{{prefix}}', $object['prefix']['name'], $object['resources']['controller']['namespace']);
            $controller_class = str_replace('{{name}}', ucfirst($controller), $controller_class);

			if(isset($object['action']) && !empty($object['action'])) {
				$action = $object['action'];
			} else {
				$action = 'index';
			}

            define('PREFIX', $object['prefix']['name'] , true);

            $controller_path = str_replace('{{prefix}}', $object['prefix']['name'], $object['resources']['controller']['path']);
            $controller_path = str_replace('{{name}}', ucfirst($controller), $controller_path);

            $object['resources']['controller']['path'] = $controller_path;
            $object['resources']['controller']['namespace'] = $controller_class;

            $object['resources']['template']['path'] = str_replace('{{prefix}}', $object['prefix']['name'], $object['resources']['template']['path']);

            $view_path = str_replace('{{prefix}}', $object['prefix']['name'], $object['resources']['view']['path']);
            $view_path = str_replace('{{name}}', $action, $view_path);
            $view_path = str_replace('{{controller}}', $controller, $view_path);

            $object['resources']['view']['path'] = $view_path;

            $model_namespace = str_replace('{{name}}', $controller, $object['resources']['model']['namespace']);
            $object['resources']['model']['namespace'] = $model_namespace;


			if (file_exists($controller_path)) {

			    $controller_to_call = new $controller_class();
                $controller_to_call->setResource($object);

				if (method_exists($controller_to_call, $action)) {
					if(isset($object['args'])) {
						$controller_to_call->$action($object);
					} else {
						$controller_to_call->$action();
					}

				} else {

                    //throw new \Exception('Action {'.$action.'} not found in controller {'.$controller_class.'}');
                    Error::OnActionNotFound('?path='.$controller_path.'&controller='.$controller.'&action='.$action);
				}
			} else {
                //throw new \Exception('Could not find controller {'.$controller.'} path = '.$controller_path);
                Error::OnControllerNotFound('?path='.$controller_path.'&name='.$controller);
			}

			exit();

		} else {
            //sthrow new \Exception('System can process a null router object');
            Error::OnNullRouter('?msg=Error:: Null Route object passed for Routing');
		}
	}
}
?>