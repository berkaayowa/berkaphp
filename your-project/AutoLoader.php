<?php
namespace autoload;
class AppClassLoader 
{

	public static function loadControllerRequires() {
		$baseDir = $_SERVER['DOCUMENT_ROOT'];
		require_once($baseDir.'/berkaPhp/Controllers/AppController.php');
		require_once($baseDir.'/berkaPhp/template/AppView.php');
	}

	public static function loadControllerRequired($controller) {
		$baseDir = $_SERVER['DOCUMENT_ROOT'];
		require($baseDir.'Controller/'.$controller.'Table.php');
	}

	public static function loadBaseControllerRequires() {
		require_once('berkaPhp/template/AppView.php');
        require_once('berkaPhp/config/Settings.php');

        foreach (glob("berkaPhp/Helpers/*.php") as $filename)
        {
            require_once($filename);
        }

	}

	public static function loadRouteRequired() {
		$baseDir = $_SERVER['DOCUMENT_ROOT'];
		require_once($baseDir.'/berkaPhp/config/Router/Router.php');
		require_once($baseDir.'/berkaPhp/config/Router/Routing.php');
	}

	public static function loadModelRequired($model) {
		require('Models/'.$model.'Table.php');
	}

	public static function loadBaseModel() {
		$baseDir = $_SERVER['DOCUMENT_ROOT'];
		require_once('berkaPhp/models/AppTable.php');
	}

	public static function loadIndexRequires() {
		require_once('berkaPhp/config/Route.php');
	}

	public static function loadDatabase() {
		require_once('berkaPhp/config/Settings.php');
		require_once('berkaPhp/database/DataBase.php');
		require_once('berkaPhp/database/QueryBuilder.php');
	}

	public static function loadBaseComponent() {
		require_once('berkaPhp/Controllers/Components/AppComponent.php');
	}

	public static function loadRoute() {
		require_once('berkaPhp/config/Router/Router.php');
		require_once('berkaPhp/config/Router/Routing.php');
	}

    public static function loadHelpers() {

    }



}


?>

