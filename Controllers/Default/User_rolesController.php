<?php
	namespace controller;
	use berkaPhp\Controller\BerkaPhpController;

	class User_rolesController extends BerkaPhpController
	{

		function __construct() {
			parent::__construct();
		}

        /* Display all user_roles from database
        *  Default action in this controller
        *  @author berkaPhp
        */

		function index() {

			$result = $this->model->fetchAll();
			$this->view->set('user_roles', $result);
			$this->view->render();

		}

        /* Add user_role into database
        *  Getting data from Post
        *  @author berkaPhp
        */

		function add() {

			if($this->is_set($this->getPost())) {
				if ($this->model->add($this->getPost())) {
					$this->view->set('message', ['success'=>'Saved user_role']);
				} else {
					$this->view->set('message', ['error'=>' Could not Saved user_role !']);
				}
			}

			$this->view->render();
		}

        /* Edit user_role and update the table
        *  Getting data from Post
        *  Id from params array
        *  @author berkaPhp
        */

		function edit($params) {

			$id = $params['params'];

			if($this->is_set($this->getPost())) {
				if ($this->model->update($this->getPost())) {
					$this->view->set('message', ['success'=>'Edited user_role']);
				} else {
					$this->view->set('message', ['error'=>' Could not Edit user_role !']);
				}
			}

			$result = $this->model->fetchBy(['fields'=>['role_id'=>$id]]);
			$this->view->set('user_role',$result);
			$this->view->render();
		}

        /* Delete user_role from the table
        *  Getting user_role Id from params array
        *  @author berkaPhp
        */

		function delete($params) {

			$id = $params['params'];

			if($this->model->delete($id)) {
				$this->view->set('message', ['success'=>'Deleted user_role']);
			} else {
				$this->view->set('message', ['error'=>' Could not Delete user_role !']);
			}

			$this->index();

		}

        /* Viewing user_role from the table
        *  Getting user_role Id from params array
        *  @author berkaPhp
        */

		function view($params) {

			$id = $params['params'];

			$result = $this->model->fetchBy(['fields'=>['role_id'=>$id]]);
			$this->view->set('user_role',$result);
			$this->view->render();
		}

	}

?>