<?php
namespace models;

/* Using the base BerkaPhpModel to extend it and  inherit table functionality
*  Default action in this controller
*  @author berkaPhp
*/

use berkaPhp\model\BerkaPhpModel;

class ProductsModel extends BerkaPhpModel
{
	function __construct() {

        /* Initializing the parent table
        *  @param current table name
        *  @author berkaPhp
        */

		parent::__construct('products');

		/* Initializing the primary key for this  table
        *  @author berkaPhp
        */

		$this->primary_key = 'ID';
	}
}
?>