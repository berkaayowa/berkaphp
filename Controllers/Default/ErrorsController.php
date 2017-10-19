<?php
	namespace controller;
	use berkaPhp\Controller\AppController;

	class ErrorsController extends AppController
	{

		function __construct() {
			parent::__construct(false);
		}

		function index($params) {
			$this->appView->render();
		}

        function unauthorized() {
            $this->appView->render();
        }

        function no_found() {
            $this->appView->render();
        }

        function templatenotfound($params) {

            $details = $params['options'];
            $this->appView->set("details", $details);
            $this->appView->render();

        }

        function controllernotfound($params) {

            $details = $params['options'];
            $this->appView->set("details", $details);
            $this->appView->render();

        }

        function actionnotfound($params) {

            $details = $params['options'];
            $this->appView->set("details", $details);
            $this->appView->render();
        }

        function modelnotfound($params) {

            $details = $params['options'];
            $this->appView->set("details", $details);
            $this->appView->render();
        }

        function dbnotconnected() {
            $this->appView->render();
        }

        function componentnotfound($params) {
            $this->appView->render();
        }

	}

?>