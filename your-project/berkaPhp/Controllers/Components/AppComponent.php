<?php
	namespace berkaPhp\controller\component;
	require_once('AutoLoader.php');
	use autoload\AppClassLoader;
	AppClassLoader::loadDatabase();

	interface Component {
		function set_name($value);
		function set_author($value);
		function set_description($value);
	}

	class AppComponent implements Component
	{
		protected $db;
		private $name, $author, $description;

		function __construct()
		{
			$this->db = new \berkaPhp\database\MySqlDatabase(
				\berkaPhp\config\settings()
			);
		}

		public function get_name() {
			return $this->name;
		}

		public function get_author() {
			return $this->author;
		}

		public function get_description() {
			return $this->description;
		}

		public function set_name($value) {
			$this->name = $value;
		}

		public function set_author($value) {
			$this->author = $value;
		}

		public function set_description($value) {
			$this->description = $value;
		}

	}

?>