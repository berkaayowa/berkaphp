<?php
	namespace berkaPhp\config;

    define('DEBUG', false, true);

    //Database settings
    define('SERVER', '', true);
    define('DB', '', true);
    define('DB_USERNAME', '', true);
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

