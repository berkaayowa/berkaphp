<?php
	namespace controller;
	use berkaPhp\Controller\AppController;

	class UsersController extends AppController
	{

		function __construct() {
			parent::__construct();
		}

        /* Display all users from database
        *  Default action in this controller
        *  @author berkaPhp
        */

		function index() {

			$result = $this->model->fetchAll();
			$this->appView->set('users', $result);
			$this->appView->render();

		}

        /* Add user into database
        *  Getting data from Post
        *  @author berkaPhp
        */

		function add() {

			if($this->is_set($this->getPost())) {
				if ($this->model->add($this->getPost())) {
					$this->appView->set('message', ['success'=>'Saved user']);
				} else {
					$this->appView->set('message', ['error'=>' Could not Saved user !']);
				}
			}

            $this->model->update(
                [
                    'user_id'=>1,
                    'user_email'=>'beb@gmail.com',
                    'user_password'=>'hdhhdhhdh'
                ]
            );

            //fields
            //$this->model->update(['user_id'=>1,'user_name'=>'ayowa','user_email'=>'beb@gmail.com','user_password'=>'hdhhdhhdh']);

			//$this->appView->render();
            //'user_id'=>1,'user_name'=>'ayowa',


            //['fields'=>['user_id'=>1]]
		}

        /* Edit user and update the table
        *  Getting data from Post
        *  Id from params array
        *  @author berkaPhp
        */

		function edit($params) {

			$id = '1'; //$params['params'];

			if($this->is_set($this->getPost())) {
				if ($this->model->update($this->getPost())) {
					$this->appView->set('message', ['success'=>'Edited user']);
				} else {
					$this->appView->set('message', ['error'=>' Could not Edit user !']);
				}
			}

			$result = $this->model->_fetchBy([
                'fields'=>[
                    'user_id'=>$id
                ],
                'options'=> [
                    'order by'=> ['user_id','desc']
                ],
                'select'=> [
                    'user_id', 'user_name'
                ]

            ],[
                'join'=> true
            ]);

            var_dump($result);
			//$this->appView->set('user',$result);
			//$this->appView->render();
		}

        /* Delete user from the table
        *  Getting user Id from params array
        *  @author berkaPhp
        */

		function delete($params) {

			$id = $params['params'][0];

			if($this->model->delete($id)) {
				$this->appView->set('message', ['success'=>'Deleted user']);
			} else {
				$this->appView->set('message', ['error'=>' Could not Delete user !']);
			}

			$this->index();

		}

        /* Viewing user from the table
        *  Getting user Id from params array
        *  @author berkaPhp
        */

		function view($params) {

			$id = $params['params'][0];

			$result = $this->model->fetchBy(['fields'=>['user_id'=>$id]]);
			$this->appView->set('user',$result);
			$this->appView->render();
		}

	}

?>