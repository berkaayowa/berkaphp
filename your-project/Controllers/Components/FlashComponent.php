<?php
namespace controller\component;
use berkaPhp\controller\component\AppComponent;

class FlashComponent extends AppComponent
{
	private $success;
	private $error;
	function __construct() {
		parent::__construct();
		$this->setName('Flash');
		$this->setAuthor('berkaPhp');
		$this->setDescription('');
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