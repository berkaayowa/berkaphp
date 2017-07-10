<?php
namespace models;
require_once('AutoLoader.php');
use autoload\AppClassLoader;
AppClassLoader::loadBaseModel();

use berkaPhp\database\table\AppTable;

class ErrorsTable extends AppTable
{
	function __construct() {
		parent::__construct('errors');
		$this->primary_key = 'error_id';
	}
}
?>