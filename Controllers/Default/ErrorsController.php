<?php
	namespace controller;
	use berkaPhp\Controller\BerkaPhpController;

	class ErrorsController extends BerkaPhpController
	{

		function __construct() {
			parent::__construct(false);
		}

		function index($params) {

		}

        function unauthorized() {

        }

        function no_found() {

        }

        function templatenotfound($params) {

            $details = $params['options'];
            $this->view->set("details", $details);


        }

        function controllernotfound($params) {

            $details = $params['options'];
            $this->view->set("details", $details);


        }

        function actionnotfound($params) {

            $details = $params['options'];
            $this->view->set("details", $details);

        }

        function modelnotfound($params) {

            $details = $params['options'];
            $this->view->set("details", $details);

        }

        function dbnotconnected() {

        }

        function componentnotfound($params) {

        }

	}

?>