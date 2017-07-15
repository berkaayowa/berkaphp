<?php
	namespace berkaPhp\Controller;
	require_once('AutoLoader.php');
	use \autoload\AppClassLoader;
	AppClassLoader::loadBaseControllerRequires();

	class AppController
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
			$current_model = $this->get_current_model(get_class($this));

			if ($has_model) {

                $path = 'Models/'.$current_model.'Table.php';

                if($this->check_model_exist($path, $current_model)) {

                    AppClassLoader::loadModelRequired($current_model);
                    $model = "\\models\\".$current_model."Table";
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
		protected function load_model($model_name) {
			AppClassLoader::loadModelRequired($model_name);
			$model = "models\\".$model_name."Table";
			return  new $model();
		}
		/* fetches all data from database
		* @access public
		* @param  [$query] query to be executed
		* @return [array] array of customers
		* @author berkaPhp
		*/
		private function get_current_model($current_model) {
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
		protected function load_component($componet_name) {
			require_once('Controllers/Components/'.$componet_name.'Component.php');
			$component = "\\controller\\component\\".$componet_name."Component";
			return  new $component();
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
		protected function get_post() {
			return $_POST;
		}
		/* fetches all data from database
		* @access public
		* @param  [$query] query to be executed
		* @return [array] array of customers
		* @author berkaPhp
		*/
		protected function get_POST_key($key, $defaul = '') {
			return isset($_POST[$key]) ? $_POST[$key] : $defaul;
		}
		/* fetches all data from database
		* @access public
		* @param  [$query] query to be executed
		* @return [array] array of customers
		* @author berkaPhp
		*/
		protected function json_format($vlues) {
			print(json_encode($vlues));
		}

		protected function set_user_right($user_role){


		}

        private function check_model_exist($path, $name='') {

            if(\berkaPhp\helpers\FileStream::file_exist($path)) {
                return true;
            } else {
                \berkaPhp\helpers\RedirectHelper::redirect('/errors/modelnotfound/?path='.$path.'&name='.$name);
            }

        }
	}

?>