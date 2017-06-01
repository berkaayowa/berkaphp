<?php
	namespace controller;
	require_once('AutoLoader.php');
	use autoload\AppClassLoader;
	AppClassLoader::loadControllerRequires();
	use berkaPhp\Controller\AppController;
	use berkaPhp\template\AppView;

	class ContactController extends AppController
	{

		function __construct() {
			parent::__construct();
		}

		function index() {
            $result = $this->model->fetch_by(['id'=>1]);
            $this->appView->set('contact', $result[0]);
			$this->appView->render();
		}

        function test() {
            $this->appView->render();
        }

	}

?>