<?php
	namespace controller;
	use berkaPhp\Controller\BerkaPhpController;

	class DropdownController extends BerkaPhpController
	{

		function __construct() {
			parent::__construct(false);
		}

		function type($options) {

            $this->view->autoRender = false;
            $result = $this->loadModel($options["params"])->fetchAll();
            return (sizeof($result) > 0) ? $this->jsonFormat($result): $this->jsonFormat(array());

		}
	}

?>