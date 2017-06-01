<?php

    //echo phpinfo();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
	//define('PREFIX', 'Admin', true);
    //define('PREFIX', 'Customer', true);
	require_once('AutoLoader.php');
	use autoload\AppClassLoader;
	AppClassLoader::loadIndexRequires();
	use berkaPhp\config;
	//$baseDir = 'http://'.$_SERVER['SERVER_NAME'];http://www.solutionsbg.com/software_development.php?lang=en
	//http://fontawesome.io/icons/https://www.smartweb.co.za/web-hosting.php
?>