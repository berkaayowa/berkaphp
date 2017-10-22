<?php
	namespace berkaPhp\Controller;

	class BerkaPhpController
	{
		protected $model;
		protected $appView;
		protected $variable;
		protected $session;
		protected $cookie;

		function __construct($has_model = true)
		{
			$this->session = new \berkaPhp\helpers\SessionHelper();
			$this->cookie = new \berkaPhp\helpers\CookieHelper();
			$model = null;
			$current_model = $this->getCurrentModel(get_class($this));

			if ($has_model) {

                $path = 'Models/'.$current_model.'Model.php';

                if($this->checkModelExist($path, $current_model)) {

                    $model = "\\models\\".$current_model."Model";
                    $this->model = new $model();

                }

			}

			$this->variable = array();
			$this->appView = new \berkaPhp\template\AppView();
		}

        protected function console($value) {
            $this->appView->set('flash',$value);
        }
		/* fetches all data from database
		* @access public
		* @param  [$query] query to be executed
		* @return [array] array of customers
		* @author berkaPhp
		*/
		protected function loadModel($model_name) {
			$model = "models\\".$model_name."Model";
			return  new $model();
		}
		/* fetches all data from database
		* @access public
		* @param  [$query] query to be executed
		* @return [array] array of customers
		* @author berkaPhp
		*/
		private function getCurrentModel($current_model) {
			$current_model = str_replace('Controller','',$current_model);
			$current_model = str_replace('controller','',$current_model);
			$current_model = str_replace('\\','',$current_model);
			return trim($current_model);
		}
		/* fetches all data from database
		* @access public
		* @param  [$query] query to be executed
		* @return [array] array of customers
		* @author berkaPhp
		*/
		protected function loadComponent($component_name) {

            $path = 'Controllers/Components/'.$component_name.'Component.php';

            if(\berkaPhp\helpers\FileStream::fileExist($path)) {
                $component = "\\controller\\component\\".$component_name."Component";
                return  new $component();
            } else {
                \berkaPhp\helpers\RedirectHelper::redirect('/errors/componentnotfound/?path='.$path.'&name='.$component_name);
            }

		}
		/* fetches all data from database
		* @access public
		* @param  [$query] query to be executed
		* @return [array] array of customers
		* @author berkaPhp
		*/
		protected function is_set($value) {
			if (isset($value) && !empty($value)) {
				return true;
			}
			return false;
		}
		/* fetches all data from database
		* @access public
		* @param  [$query] query to be executed
		* @return [array] array of customers
		* @author berkaPhp
		*/
		protected function getPost() {
			return $_POST;
		}
		/* fetches all data from database
		* @access public
		* @param  [$query] query to be executed
		* @return [array] array of customers
		* @author berkaPhp
		*/
		protected function getPostKey($key, $defaul = '') {
			return isset($_POST[$key]) ? $_POST[$key] : $defaul;
		}
		/* fetches all data from database
		* @access public
		* @param  [$query] query to be executed
		* @return [array] array of customers
		* @author berkaPhp
		*/
		protected function jsonFormat($values) {
			return json_encode($values);
		}

        private function checkModelExist($path, $name='') {

            if(\berkaPhp\helpers\FileStream::fileExist($path)) {
                return true;
            } else {
                \berkaPhp\helpers\RedirectHelper::redirect('/errors/modelnotfound/?path='.$path.'&name='.$name);
            }

        }

        protected function dbInstance($query) {
            return \berkaPhp\database\table\GlobalModel::runQuery($query);
        }
	}

?>