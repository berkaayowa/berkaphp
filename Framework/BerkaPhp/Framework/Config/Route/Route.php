<?php
namespace Framework\Config\Router;
use BerkaPhp\Helper\Debug;
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
        $router->addPrefix('framework', ['name'=>'Framework', 'home'=>'page']);

        /**
         * Created by PhpStorm.
         * User: Berka
         * Date: 2018-07-13
         * Time: 2:44 AM
         * setup routing
         */

        $router->route('/framework', function ($route) {

            $route['resources']['view']['path'] = 'BerkaPhp/Framework/Views/Framework/{{controller}}/{{name}}';
            $route['resources']['controller']['path'] = 'BerkaPhp/Framework/Controllers/Framework/{{name}}Controller.php';
            $route['resources']['template']['path'] = 'BerkaPhp/Framework/Views/Framework/Layout/layout';

            Route::to($route);
        });


        return $router;

    }
}

?>