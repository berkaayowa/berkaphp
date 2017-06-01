<?php
namespace controller\component;
require_once('AutoLoader.php');
use autoload\AppClassLoader;
use berkaPhp\controller\component\AppComponent;
AppClassLoader::loadBaseComponent();

class FlashComponent extends AppComponent
{
	private $success;
	private $error;
	function __construct() {
		parent::__construct();
		$this->set_name('Flash');
		$this->set_author('berkaPhp');
		$this->set_description('');
		$this->success = '<div class="alert alert-success" style = "position: fixed;top: 0;left: 0; right: 0; margin-left: auto; margin-right: auto; width: 200px;text-align: center;z-index: 999999;"><strong>Success! </strong>@</div>';
		$this->error = '<div class="alert alert-danger" style = "position: fixed;top: 0;left: 0; right: 0; margin-left: auto; margin-right: auto; width: 200px;text-align: center;z-index: 999999;"><strong>Error! </strong>@</div>';
	}

	public function success($message) {
		echo str_replace('@', $message, $this->success);
	}

	public function error($message) {
		echo str_replace('@', $message, $this->error);
	}
}

?>