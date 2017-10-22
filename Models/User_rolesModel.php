<?php
namespace models;

/* Using the base AppTable to extend it and  inherit table functionality
*  Default action in this controller
*  @author berkaPhp
*/

use berkaPhp\model\BerkaPhpModel;

class User_rolesModel extends BerkaPhpModel
{
	function __construct() {

        /* Initializing the parent table
        *  @param current table name
        *  @author berkaPhp
        */

		parent::__construct('user_roles');

		/* Initializing the primary key for this  table
        *  @author berkaPhp
        */

		$this->primary_key = 'role_id';
    }
    
    function afterFetch($data) {
        var_dump($data);
        return $data;
    }

    function beforeUpdate($data) {
        var_dump($data);
        return $data;
    }

    

}
?>