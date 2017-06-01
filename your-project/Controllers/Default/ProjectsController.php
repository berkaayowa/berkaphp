<?php
	namespace controller;
	require_once('AutoLoader.php');
	use autoload\AppClassLoader;
	AppClassLoader::loadControllerRequires();
	use berkaPhp\Controller\AppController;
	use berkaPhp\template\AppView;

	class ProjectsController extends AppController
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
			$this->appView->set('projects', $result);
			$this->appView->render();
		}

		function add() {
			if($this->is_set($this->get_post())) {
				if ($this->model->add($this->get_post())) {
					$this->flash->success(' Saved project');
				} else {
					$this->flash->error(' Could not Saved project !');
				}
			}

            $users = $this->load_model('Users')->fetch_all();
            $project_types = $this->load_model('Project_types')->fetch_all();

            $this->appView->set('project_types',$project_types);
            $this->appView->set('users',$users);

			$this->appView->render();
		}

		function edit($params) {
			$id = $params['params'][0];

			if($this->is_set($this->get_post())) {
				if ($this->model->update($this->get_post())) {
					$this->flash->success(' Edited project');
				} else {
					$this->flash->error(' Could not Edit project !');
				}
			}

			$result = $this->model->fetch_by(['project_id'=>$id]);
			$this->appView->set('project',$result[0]);
			$this->appView->render();
		}

		function delete($params) {
			$id = $params['params'][0];
			if($this->model->delete($id)) {
				$this->flash->success(' Deleted project');
			} else {
				$this->flash->error(' Could not Delete project !');
			}

			$this->index();
		}

		function view($params) {
			$id = $params['params'][0];

			$result = $this->model->fetch_by(['project_id'=>$id]);
			$this->appView->set('project',$result);
			$this->appView->render();
		}

		function api() {
			return $this->json_format($this->model->fetch_all());
		}

		function search() {
			$tag = $this->get_POST_key('search');
			$result = $this->model->fetch_like($tag);
			$this->appView->set('projects',$result);
			$this->appView->run_render('index');
		}

	}

?>