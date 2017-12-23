<?php
	namespace controller;
	use berkaPhp\Controller\BerkaPhpController;

	class ProductsController extends BerkaPhpController
	{

		function __construct() {
			parent::__construct();
		}

        /* Display all products from database
        *  Default action in this controller
        *  @author berkaPhp
        */

		function index() {

			$result = $this->model->fetchAll();
			$this->view->set('products', $result);
			$this->view->render();

		}

        /* Add product into database
        *  Getting data from Post
        *  @author berkaPhp
        */

		function add() {

            //print_r($_FILES);echo '<pre>';exit();
			if($this->is_set($this->getPost())) {
				if ($this->model->add($this->getPost())) {
					$this->view->set('message', ['success'=>'Saved product']);
				} else {
					$this->view->set('message', ['error'=>' Could not Saved product !']);
				}
			}

			$this->view->render();
		}

        /* Edit product and update the table
        *  Getting data from Post
        *  Id from params array
        *  @author berkaPhp
        */

		function edit($params) {

			$id = $params['params'];

			if($this->is_set($this->getPost())) {
				if ($this->model->update($this->getPost())) {
					$this->view->set('message', ['success'=>'Edited product']);
				} else {
					$this->view->set('message', ['error'=>' Could not Edit product !']);
				}
			}

			$result = $this->model->fetchBy(['fields'=>['ID'=>$id]]);
			$this->view->set('product',$result);
			$this->view->render();
		}

        /* Delete product from the table
        *  Getting product Id from params array
        *  @author berkaPhp
        */

		function delete($params) {

			$id = $params['params'];

			if($this->model->delete($id)) {
				$this->view->set('message', ['success'=>'Deleted product']);
			} else {
				$this->view->set('message', ['error'=>' Could not Delete product !']);
			}

			$this->index();

		}

        /* Viewing product from the table
        *  Getting product Id from params array
        *  @author berkaPhp
        */

		function view($params) {

			$id = $params['params'];

			$result = $this->model->fetchBy(['fields'=>['ID'=>$id]]);
			$this->view->set('product',$result);
			$this->view->render();
		}

	}

?>