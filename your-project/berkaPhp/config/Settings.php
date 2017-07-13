<?php
	namespace berkaPhp\config;

    define('DEBUG', true, true);

    //Database settings
    define('SERVER', '127.0.0.1', true);
    define('DB', 'miwork', true);
    define('DB_USERNAME', 'root', true);
    define('DB_PW', $_SERVER['SERVER_NAME']=='www.yourlivesite.com' ? '' : '', true);

    //default controller
    define('HOME', 'pages' , true);

    //default prefix
    define('DEFAULT_PREFIX', 'Default' , true);

    define('SITE_URL', 'www.yourlivesite.com' , true);
    define('LOGO_URL', '/Views/Default/Assets/logo.png' , true);


?>

















































<?php

    function prefixes() {
        return ['Default', 'Admin'];
    }

    function settings(){
		$localDatabase = array(
			'server' => SERVER,
			'username' => DB_USERNAME,
            'password' => DB_PW,
            'dbname' => DB
		);

		return $localDatabase ;
	}

?>

