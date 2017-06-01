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
		private $paginate;

		function __construct() {
			parent::__construct();
		}

		function index($params) {
            $code = $params['options']['code'];
			$result = $this->model->fetch_all();
			$this->appView->set('error', $result);
			$this->appView->render();
			//$this->appView->render_ajax();
		}

        function unauthorized() {
            $this->appView->render();
        }

        function no_found() {

            $this->appView->render();
        }

	}

?>