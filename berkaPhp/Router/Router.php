<?php
	namespace berkaPhp\router;
	use berkaPhp\router\dispacher\Route;
	use berkaPhp\router\dispacher\BerkaPhpDispacher;

	$router = new BerkaPhpDispacher($_SERVER);

	$router->route('/test', function($route){
		$route['controller'] = 'pages';
		$route['action'] = 'index';
		Route::to($route);
	});

	$router->route('/berka', function($route){
		$route['controller'] = 'installer';
		$route['action'] = 'database';
		Route::to($route);

	});

	$router->route('/', function($route){
		Route::to($route);
	});

	$router->start();


?>

