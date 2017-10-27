<?php
	namespace berkaPhp\router;
	use berkaPhp\router\dispacher\Route;
	use berkaPhp\router\dispacher\BerkaPhpDispacher;

	$router = new BerkaPhpDispacher($_SERVER);

	$router->route('/', function($route){
		Route::to($route);
	});

	$router->start();


?>

