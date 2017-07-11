<?php
	namespace berkaPhp\config;
	
    define('DEBUG', false, true);

    //Database settings

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

?>

