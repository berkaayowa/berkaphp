<?php
	namespace controller;
	use berkaPhp\Controller\BerkaPhpController;
	use berkaPhp\template\view;

	class GeneratorsController extends BerkaPhpController
	{

		private $genarator;

		function __construct() {
			
			parent::__construct(false);
            $this->genarator = $this->loadComponent("Generator");
		}

		function index() {
			//$this->view->render();
		}

		function file() {

			if($this->is_set($this->getPost())) {
				if($this->getPost()['table'] != '---' && isset($this->getPost()['table'])) {

					$table = $this->getPost()['table'];
					$this->genarator->setClassName(ucfirst($table));

					if (isset($this->getPost()['all'])) {


						if ($this->genarator->generateModel()) {

						}

						if ($this->genarator->generateController()) {

						}

						if ($this->genarator->generateViews()) {

                        }

                        $this->view->set("message",['success'=>"Elements Created "]);

					} else {

						if (isset($this->getPost()['model'])) {

							if ($this->genarator->generateModel()) {
                                $this->view->set("message",['success'=>"Model Created "]);
							}

						} elseif (isset($this->getPost()['views'])) {

                            if ($this->genarator->generateViews()) {
                                $this->view->set("message",['success'=>"Views Created "]);
                            }

						} elseif (isset($this->getPost()['controller'])) {

							if ($this->genarator->generateController()) {
                                $this->view->set("message",['success'=>"Controller Created "]);
							}

						}
					}

				} else {

                    $this->view->set("message",['error'=>" Select a table "]);
				}
			}
			$this->view->set('tables',$this->genarator->getTables());
			$this->view->render();
		}

		function get() {
			die($this->genarator->getPrimaryKey());
		}

	}

?>