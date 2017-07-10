<?php
	namespace controller;
	require_once('AutoLoader.php');
	use autoload\AppClassLoader;
	AppClassLoader::loadControllerRequires();
	use berkaPhp\Controller\AppController;
	use berkaPhp\template\AppView;

	class ErrorsController extends AppController
	{
		private $flash;

		function __construct() {
			parent::__construct();
			$this->flash = $this->load_component('Flash');
		}

		function index($params) {
			$this->appView->render();
		}

        function unauthorized() {
            $this->appView->render();
        }

        function no_found() {
            $this->appView->render();
        }

	}

?>