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
			parent::__construct('Users');
			$this->flash = $this->load_component('Flash');
			$this->genarator = $this->load_component('Generator');
		}

		function index() {
			//$this->appView->render();
		}

		function run() {
			if($this->is_set($this->get_post())) {
				if($this->get_post()['table'] != '---' && isset($this->get_post()['table'])) {
					$table = $this->get_post()['table'];
					$this->genarator->set_class_name(ucfirst($table));
					if (isset($this->get_post()['all'])) {
						if ($this->genarator->generate_model()) {
							$this->flash->success(' Model Created');
						}
						if ($this->genarator->generate_controller()) {
							$this->flash->success(' Controller Created');
						}
						$this->genarator->generate_views();
						$this->flash->success('Elements Created');
					} else {
						if (isset($this->get_post()['mode'])) {
							if ($this->genarator->generate_model()) {
								$this->flash->success(' Model Created');
							}
						} elseif (isset($this->get_post()['views'])) {
							$this->genarator->generate_views();
							$this->flash->success(' Views Created');
						} elseif (isset($this->get_post()['controller'])) {
							if ($this->genarator->generate_controller()) {
								$this->flash->success(' Controller Created');
							}
						}
					}
				} elseif (isset($this->get_post()['all_table'])) {
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