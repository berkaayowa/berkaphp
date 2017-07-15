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
			parent::__construct(false);
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

        function templatenotfound($params) {

            $details = $params['options'];
            $this->appView->set("details", $details);
            $this->appView->render();

        }

        function controllernotfound($params) {

            $details = $params['options'];
            $this->appView->set("details", $details);
            $this->appView->render();

        }

        function actionnotfound($params) {

            $details = $params['options'];
            $this->appView->set("details", $details);
            $this->appView->render();
        }

	}

?>