<?php
	namespace berkaPhp\router;
	use berkaPhp\router\dispacher\Route;
	use berkaPhp\router\dispacher\BerkaPhpDispacher;

	$app = new BerkaPhpDispacher($_SERVER);

	$app->route('/', function($route){
		Route::to($route);
	});

	$app->route('/test', function($route){
		Route::to($route);
	});


?>






























<?php
// $app->get('/user', function($route){

	// 	Routing::to([
	// 		'controller'=>'Users',
	// 		'action'=>'view',
	// 		'params'=>[
	// 			'id'=>$route['params'][0]
	// 		]
	// 	]);
	// });

	// $app->get('/users', function($route) {

	// });

	// $app->get('/products', function($route){

	// });
	// $app->get('/attractions', function($route){
	// 	//var_dump($route);
	// 	//echo "string";
	// 	Routing::to(['controller'=>'Attractions', 'action'=>'index']);
	// 	//var_dump($route);
	// });
// $app->get('/attractions', function($route){
	// 	//var_dump($route);
	// 	//echo "string";
	// 	Routing::to(['controller'=>'Attractions', 'action'=>'index']);
	// 	//var_dump($route);
	// });

	// $app->get('/cities', function($route){
	// 	Routing::to(['controller'=>'Cities', 'action'=>'index']);
	// });




?>