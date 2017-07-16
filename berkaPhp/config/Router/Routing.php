<?php
namespace berkaPhp\config\router;

class Routing
{

	function __construct()
	{
		# code...
	}

	public static function to($object) {

		if($object != null) {

			$controller = !empty($object['controller']) ? $object['controller'] : HOME;
			$controller_calss = "\\controller\\".ucfirst($controller)."Controller";

			if(isset($object['action']) || !empty($object['action'])) {
				$action =$object['action'];
			} else {
				$action =$object['action'] = 'index';
			}

			$controller_path = 'Controllers/'.$object['prefix'].'/'.ucfirst($controller).'Controller.php';
           // die($controller_path);
			if (file_exists($controller_path)) {

				if(strtolower($controller) == 'generators') {
					$controller_to_call = new $controller_calss();
				} else {
					$controller_to_call = new $controller_calss();
				}

				if (method_exists($controller_to_call, $action)) {

					if(isset($object['params'])) {
						$controller_to_call->$action($object);
					} else {
						$controller_to_call->$action();
					}

				} else {

                    \berkaPhp\helpers\RedirectHelper::redirect(
                        '/errors/actionnotfound/?path='.$controller_path.'&controller='.$controller.'&action='.$action
                    );
					
				}
			} else {

                \berkaPhp\helpers\RedirectHelper::redirect(
                    '/errors/controllernotfound/?path='.$controller_path.'&name='.$controller
                );
			}

		} else {
			die('Error:: Null Route object passed for Routing');
		}
	}
}
?>