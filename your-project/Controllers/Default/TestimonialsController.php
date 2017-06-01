<?php
	namespace controller;
	require_once('AutoLoader.php');
	use autoload\AppClassLoader;
	AppClassLoader::loadControllerRequires();
	use berkaPhp\Controller\AppController;
	use berkaPhp\template\AppView;

	class TestimonialsController extends AppController
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
			$this->appView->set('testimonials', $result);
			$this->appView->render();
		}

		function add() {
			if($this->is_set($this->get_post())) {
				if ($this->model->add($this->get_post())) {
					$this->flash->success(' Saved testimonial');
				} else {
					$this->flash->error(' Could not Saved testimonial !');
				}
			}
			$this->appView->render();
		}

		function api() {
			return $this->json_format($this->model->fetch_all());
		}

		function search() {
			$tag = $this->get_POST_key('search');
			$result = $this->model->fetch_like($tag);
			$this->appView->set('testimonials',$result);
			$this->appView->run_render('index');
		}

	}

?>