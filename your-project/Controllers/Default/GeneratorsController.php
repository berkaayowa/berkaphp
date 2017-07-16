<?php
	namespace controller;
	use berkaPhp\Controller\AppController;
	use berkaPhp\template\AppView;

	class GeneratorsController extends AppController
	{

		private $genarator;

		function __construct() {
			
			parent::__construct(false);
            $this->genarator = $this->loadComponent("Generator");
		}

		function index() {
			//$this->appView->render();
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

                        $this->appView->set("message",['success'=>"Elements Created "]);

					} else {

						if (isset($this->getPost()['model'])) {

							if ($this->genarator->generateModel()) {
                                $this->appView->set("message",['success'=>"Model Created "]);
							}

						} elseif (isset($this->getPost()['views'])) {

                            if ($this->genarator->generateViews()) {
                                $this->appView->set("message",['success'=>"Views Created "]);
                            }

						} elseif (isset($this->getPost()['controller'])) {

							if ($this->genarator->generateController()) {
                                $this->appView->set("message",['success'=>"Controller Created "]);
							}

						}
					}

				} else {

                    $this->appView->set("message",['error'=>" Select a table "]);
				}
			}
			$this->appView->set('tables',$this->genarator->getTables());
			$this->appView->render();
		}

		function get() {
			die($this->genarator->getPrimaryKey());
		}

	}

?>