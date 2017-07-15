<?php
namespace models;
require_once('AutoLoader.php');
use autoload\AppClassLoader;
AppClassLoader::loadBaseModel();

use berkaPhp\database\table\AppTable;

class UsersTable extends AppTable
{
	function __construct() {
		parent::__construct('services');
		$this->primary_key = 'id';
//
//        $this->contains = [
//            'user_roles' => 'role_id'
//        ];
//
//        $this->keys = [
//            'user_roles' => 'user_ref_role'
//        ];
	}
}
?>