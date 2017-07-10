<?php
namespace models;
require_once('AutoLoader.php');
use autoload\AppClassLoader;
AppClassLoader::loadBaseModel();

use berkaPhp\database\table\AppTable;

class PagesTable extends AppTable
{
	function __construct() {
		parent::__construct('pages');
		$this->primary_key = 'page_id';
	}
}
?>