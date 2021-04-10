<?php
namespace Config\Router;
use BerkaPhp\Router\Dispatcher\Route;

/**
 * Created by PhpStorm.
 * User: f
 * Date: 2018-07-13
 * Time: 2:44 AM
 * @param $router
 */
class Router {


    public static function Setup($router){

        /**
         * Created by PhpStorm.
         * User: Berka
         * Date: 2018-07-13
         * Time: 2:44 AM
         * setup prefix
         */
        $router->prefix
        (
            [
                'client'=>[
                    'name'=>'Client',
                    'home'=>'page'
                ]
            ],
            ['default'=>'client']
        );

        /**
         * Created by PhpStorm.
         * User: Berka
         * Date: 2018-07-13
         * Time: 2:44 AM
         * setup routing
         */

        $router->route('/', function ($route) {
            Route::to($route);
        });


        return $router;

    }
}

?>