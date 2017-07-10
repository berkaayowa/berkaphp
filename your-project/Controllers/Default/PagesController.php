<?php
	namespace controller;
	require_once('AutoLoader.php');
	use autoload\AppClassLoader;
	AppClassLoader::loadControllerRequires();
	use berkaPhp\Controller\AppController;
	use berkaPhp\template\AppView;

	class PagesController extends AppController
	{

		function __construct() {
			parent::__construct(false);
		}

		function index() {
			$this->appView->render();
		}
	}

?>