<?php
	namespace BerkaPhp\Router;

    use BerkaPhp\Helper\SessionHelper;
    use BerkaPhp\Router\Dispatcher\BerkaPhpDispacher;


	$router = new BerkaPhpDispacher($_SERVER);
    $router = \Config\Router\Router::Setup($router);
    $router = \Framework\Config\Router\Router::Setup($router);
	$router->start();


?>

