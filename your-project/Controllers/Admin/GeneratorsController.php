<?php
	namespace controller;
	require_once('AutoLoader.php');
	use \autoload\AppClassLoader;
	AppClassLoader::loadControllerRequires();
	use berkaPhp\Controller\AppController;
	use berkaPhp\template\AppView;

	class GeneratorsController extends AppController
	{
		private $flash;
		private $genarator;
		private $model_;

		function __construct() {

			parent::__construct(false);
			$this->flash = $this->loadComponent('Flash');
			$this->genarator = $this->loadComponent('Generator');
			
		}

		function index() {
			//$this->appView->render();
		}

		function run() {
			if($this->is_set($this->getPost())) {
				if($this->getPost()['table'] != '---' && isset($this->getPost()['table'])) {
					$table = $this->getPost()['table'];
					$this->genarator->set_class_name(ucfirst($table));
					if (isset($this->getPost()['all'])) {
						if ($this->genarator->generate_model()) {
							$this->flash->success(' Model Created');
						}
						if ($this->genarator->generate_controller()) {
							$this->flash->success(' Controller Created');
						}
						$this->genarator->generate_views();
						$this->flash->success('Elements Created');
					} else {
						if (isset($this->getPost()['mode'])) {
							if ($this->genarator->generate_model()) {
								$this->flash->success(' Model Created');
							}
						} elseif (isset($this->getPost()['views'])) {
							$this->genarator->generate_views();
							$this->flash->success(' Views Created');
						} elseif (isset($this->getPost()['controller'])) {
							if ($this->genarator->generate_controller()) {
								$this->flash->success(' Controller Created');
							}
						}
					}
				} elseif (isset($this->getPost()['all_table'])) {
					$tables = $this->genarator->get_tables();
					$count = 0;
					foreach ($tables as $table => $name) {
						$this->genarator->set_class_name(ucfirst($name));
						if ($this->genarator->generate_model()) {
							if ($this->genarator->generate_controller()) {
								$count++;
								$this->genarator->generate_views();
								$this->flash->success($count.' / '.count($tables).' Elements Created');
							}
						}
					}
				} else {
					$this->flash->error(' Select a table !');
				}
			}
			$this->appView->set('tables',$this->genarator->get_tables());
			$this->appView->run_render('index');
		}

		function get() {
			die($this->genarator->get_primary_key());
		}

	}

?>