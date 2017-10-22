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
			$this->appView->set('user_roles', $result);
			$this->appView->render();

		}

        /* Add user_role into database
        *  Getting data from Post
        *  @author berkaPhp
        */

		function add() {

			if($this->is_set($this->getPost())) {
				if ($this->model->add($this->getPost())) {
					$this->appView->set('message', ['success'=>'Saved user_role']);
				} else {
					$this->appView->set('message', ['error'=>' Could not Saved user_role !']);
				}
			}

			$this->appView->render();
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
					$this->appView->set('message', ['success'=>'Edited user_role']);
				} else {
					$this->appView->set('message', ['error'=>' Could not Edit user_role !']);
				}
			}

			$result = $this->model->fetchBy(['fields'=>['role_id'=>$id]]);
			$this->appView->set('user_role',$result);
			$this->appView->render();
		}

        /* Delete user_role from the table
        *  Getting user_role Id from params array
        *  @author berkaPhp
        */

		function delete($params) {

			$id = $params['params'];

			if($this->model->delete($id)) {
				$this->appView->set('message', ['success'=>'Deleted user_role']);
			} else {
				$this->appView->set('message', ['error'=>' Could not Delete user_role !']);
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
			$this->appView->set('user_role',$result);
			$this->appView->render();
		}

	}

?>