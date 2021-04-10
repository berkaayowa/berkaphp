<?php
namespace Config\Router;
use BerkaPhp\Helper\RedirectHelper;

/**
 * Created by PhpStorm.
 * User: Berka Ayowa
 * Date: 2018-07-13
 * Time: 3:23 AM
 */

class Error {

    public static function OnActionNotFound($queryString = ''){
        RedirectHelper::redirect('/framework/error/actionnotfound/'.$queryString);
    }

    public static function OnControllerNotFound($queryString = ''){
        RedirectHelper::redirect('/framework/error/controllernotfound/'.$queryString);
    }

    public static function OnNullRouter($queryString = ''){

    }

    public static function OnComponentNotFound($queryString = ''){
        RedirectHelper::redirect('/framework/error/componentnotfound/'.$queryString);
    }

    public static function OnModelNotFound($queryString = ''){
        RedirectHelper::redirect('/framework/error/modelnotfound/'.$queryString);
    }

    public static function OnViewTemplateNotFound($queryString = ''){

        RedirectHelper::redirect('/framework/error/modelnotfound/'.$queryString);
    }


}

?>