<?php
	namespace controller;
	require_once('AutoLoader.php');
	use autoload\AppClassLoader;
	AppClassLoader::loadControllerRequires();
	use berkaPhp\Controller\AppController;
	use berkaPhp\template\AppView;

	class AboutController extends AppController
	{
		private $flash;
		private $paginate;

		function __construct() {
			parent::__construct();
			$this->flash = $this->load_component('Flash');
			$this->paginate = $this->load_component('Paginate');
		}

		function index() {
            $result = $this->model->fetch_by(['id'=>1]);
			$this->appView->set('about_us', $result[0]);
           // var_dump($result[0]);
			$this->appView->render();
		}

	}

?>