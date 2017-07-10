<?php
	namespace controller;
	require_once('AutoLoader.php');
	use autoload\AppClassLoader;
	AppClassLoader::loadControllerRequires();
	use berkaPhp\Controller\AppController;
	use berkaPhp\template\AppView;

	class PagesController extends AppController
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
			$this->appView->set('pages', $result);
			$this->appView->render();
		}

		function add() {
			if($this->is_set($this->get_post())) {
				if ($this->model->add($this->get_post())) {
					$this->flash->success(' Saved page');
				} else {
					$this->flash->error(' Could not Saved page !');
				}
			}

			$this->appView->render_ajax();
		}

		function edit($params) {
			$id = $params['params'][0];

			if($this->is_set($this->get_post())) {
				if ($this->model->update($this->get_post())) {
					$this->flash->success(' Edited page');
				} else {
					$this->flash->error(' Could not Edit page !');
				}
			}

			$result = $this->model->fetch_by(['page_id'=>$id]);
			$this->appView->set('page',$result);
			$this->appView->render_ajax();
		}

		function delete($params) {
			$id = $params['params'][0];
			if($this->model->delete($id)) {
				$this->flash->success(' Deleted page');
			} else {
				$this->flash->error(' Could not Delete page !');
			}

			$this->index();
		}

		function view($params) {
			$id = $params['params'][0];

			$result = $this->model->fetch_by(['page_id'=>$id]);
			$this->appView->set('page',$result);
			$this->appView->render_ajax();
		}

		function api() {
			return $this->json_format($this->model->fetch_all());
		}

		function search() {
			$tag = $this->get_POST_key('search');
			$result = $this->model->fetch_like($tag);
			$this->appView->set('pages',$result);
			$this->appView->run_render('index');
		}

	}

?>