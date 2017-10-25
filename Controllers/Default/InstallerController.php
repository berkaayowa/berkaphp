<?php
	namespace controller;
	use berkaPhp\Controller\BerkaPhpController;

	class InstallerController extends BerkaPhpController
	{
        private $installer;

		function __construct() {
			parent::__construct(false);
            $this->installer = $this->loadComponent('Installer');
		}

		function index() {
			$this->view->render();
		}

        function database() {

            if($this->is_set($this->getPost())) {

                if($this->installer->dbSettings($this->getPost())) {
                    $this->view->set("message",['success'=>"Database settings has been updated "]);
                } else {
                    $this->view->set("message",['error'=>"Could not save settings , try again"]);
                }

            }

            $this->view->render();
        }

        function requirement() {
            $this->view->render();
        }

	}

?>