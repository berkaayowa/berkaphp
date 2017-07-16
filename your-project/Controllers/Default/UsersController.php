<?php
	namespace controller;
	use berkaPhp\Controller\AppController;
	use berkaPhp\template\AppView;

	class UsersController extends AppController
	{
		private $flash;
		private $paginate;

		function __construct() {
			parent::__construct();
			$this->flash = "";//$this->load_component('Flash');
			$this->paginate = "";//$this->load_component('Paginate');
		}

		function index() {

			$result = $this->model->fetchLike([
                'fields'=>[
                    'title'=>'Web'
                ],
                'options'=>[
                    'order by'=>[
                        'id','asc'
                    ],
                    'limit'=>[
                        1,2
                    ]
                ]
            ]);

            echo "vvvv";

			$this->appView->set('users', $result);
			$this->appView->render();
		}

		function add() {
			if($this->is_set($this->getPost())) {
				if ($this->model->add($this->getPost())) {
					$this->flash->success(' Saved user');
				} else {
					$this->flash->error(' Could not Saved user !');
				}
			}

			$this->appView->render();
		}

		function edit($params) {
			$id = $params['params'][0];

			if($this->is_set($this->getPost())) {
				if ($this->model->update($this->getPost())) {
					$this->flash->success(' Edited user');
				} else {
					$this->flash->error(' Could not Edit user !');
				}
			}

			$result = $this->model->fetch_by(['user_id'=>$id]);
			$this->appView->set('user',$result);
			$this->appView->render();
		}

		function delete($params) {
			$id = $params['params'][0];
			if($this->model->delete($id)) {
				$this->flash->success(' Deleted user');
			} else {
				$this->flash->error(' Could not Delete user !');
			}

			$this->index();
		}

        function login() {
            if($this->is_set($this->getPost())) {
                $user = $this->model->fetch_where([
                    'user_email'=>$this->getPost()['user_email'],
                    'user_password'=>$this->getPost()['user_password']
                ]);

                if (sizeof($user) == 1) {
                    $this->session->add('user', $user);
                    \berkaPhp\helpers\RedirectHelper::redirect('/home');
                } else {
                    $this->appView->set('flash','Invalid login details, try again');
                }
            }

            $this->appView->render();

        }

        function logout() {
            $this->session->remove('user');
            \berkaPhp\helpers\RedirectHelper::redirect('/home');
        }

		function search() {
			$tag = $this->getPostKey('search');
			$result = $this->model->fetch_like($tag);
			$this->appView->set('users',$result);
			$this->appView->run_render('index');
		}

	}

?>