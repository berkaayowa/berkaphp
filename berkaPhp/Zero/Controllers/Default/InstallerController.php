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
			$this->appView->render();
		}

        function database() {

            if($this->is_set($this->getPost())) {

                if($this->installer->dbSettings($this->getPost())) {
                    $this->appView->set("message",['success'=>"Database settings has been updated "]);
                } else {
                    $this->appView->set("message",['error'=>"Could not save settings , try again"]);
                }

            }

            $this->appView->render();
        }

        function requirement() {
            $this->appView->render();
        }

	}

?>