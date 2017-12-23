<?php
	namespace controller;
	use berkaPhp\Controller\BerkaPhpController;

	class FilesController extends BerkaPhpController
	{

		function __construct() {
			parent::__construct();
		}

        /* Display all files from database
        *  Default action in this controller
        *  @author berkaPhp
        */

		function index() {

			$result = $this->model->fetchAll();
			$this->view->set('files', $result);
			$this->view->render();

		}

        /* Add file into database
        *  Getting data from Post
        *  @author berkaPhp
        */

		function add() {

			if($this->is_set($_FILES)) {
                $file = \berkaPhp\helpers\FileStream::fetchFileBase64("Document");
                $result = $this->dbInstance("INSERT INTO files (Document, Name, Extension ) VALUES ('".$file['data']."','".$file['name']."','".$file['extension']."')");
			}

		}

        /* Edit file and update the table
        *  Getting data from Post
        *  Id from params array
        *  @author berkaPhp
        */

		function edit($params) {

			$id = $params['params'];

			if($this->is_set($this->getPost())) {
				if ($this->model->update($this->getPost())) {
					$this->view->set('message', ['success'=>'Edited file']);
				} else {
					$this->view->set('message', ['error'=>' Could not Edit file !']);
				}
			}

			$result = $this->model->fetchBy(['fields'=>['ID'=>$id]]);
			$this->view->set('file',$result);
			$this->view->render();
		}

        /* Delete file from the table
        *  Getting file Id from params array
        *  @author berkaPhp
        */

		function delete($params) {

			$id = $params['params'];

			if($this->model->delete($id)) {
				$this->view->set('message', ['success'=>'Deleted file']);
			} else {
				$this->view->set('message', ['error'=>' Could not Delete file !']);
			}

			$this->index();

		}

        /* Viewing file from the table
        *  Getting file Id from params array
        *  @author berkaPhp
        */

		function view($params) {

			$id = $params['params'];

			$result = $this->model->fetchBy(['fields'=>['ID'=>$id]]);
			$this->view->set('file',$result);
			$this->view->render();
		}

	}

?>