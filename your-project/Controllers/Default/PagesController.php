<?php
	namespace controller;
	use berkaPhp\Controller\AppController;

	class PagesController extends AppController
	{

		function __construct() {
			parent::__construct(false);
		}

		function index() {
			$this->appView->render();
		}
	}

?>