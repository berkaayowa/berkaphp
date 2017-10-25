<?php
	namespace controller;
	use berkaPhp\Controller\BerkaPhpController;

	class ErrorsController extends BerkaPhpController
	{

		function __construct() {
			parent::__construct(false);
		}

		function index($params) {
			$this->view->render();
		}

        function unauthorized() {
            $this->view->render();
        }

        function no_found() {
            $this->view->render();
        }

        function templatenotfound($params) {

            $details = $params['options'];
            $this->view->set("details", $details);
            $this->view->render();

        }

        function controllernotfound($params) {

            $details = $params['options'];
            $this->view->set("details", $details);
            $this->view->render();

        }

        function actionnotfound($params) {

            $details = $params['options'];
            $this->view->set("details", $details);
            $this->view->render();
        }

        function modelnotfound($params) {

            $details = $params['options'];
            $this->view->set("details", $details);
            $this->view->render();
        }

        function dbnotconnected() {
            $this->view->render();
        }

        function componentnotfound($params) {
            $this->view->render();
        }

	}

?>