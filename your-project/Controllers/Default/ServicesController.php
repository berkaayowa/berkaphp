<?php
	namespace controller;
	require_once('AutoLoader.php');
	use autoload\AppClassLoader;
	AppClassLoader::loadControllerRequires();
	use berkaPhp\Controller\AppController;
	use berkaPhp\template\AppView;

	class ServicesController extends AppController
	{
		private $flash;
		private $paginate;

		function __construct() {
			parent::__construct();
			$this->flash = $this->load_component('Flash');
			$this->paginate = $this->load_component('Paginate');
		}

		function index() {
			$result = $this->model->fetch_all();
			$this->appView->set('services', $result);
			return $this->appView->render();
		}

		function view($params) {
			$id = $params['params'][0];

			$result = $this->model->fetch_by(['id'=>$id]);
			$this->appView->set('service',$result);
			return $this->appView->render_ajax();
		}

		function api() {
			return $this->json_format($this->model->fetch_all());
		}

		function search() {
			$tag = $this->get_POST_key('search');
			$result = $this->model->fetch_like($tag);
			$this->appView->set('services',$result);
			$this->appView->run_render('index');
		}

	}

?>