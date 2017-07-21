<?php
/**
 * Created by PhpStorm.
 * User: berka
 * Date: 7/21/17
 * Time: 1:00 AM
 */

namespace berkaPhp\database\table;
use \berkaPhp\database\MySqlDatabase;
use \berkaPhp\config;


class GlobalModel {

    public static function runQuery($query) {
        $db = new MySqlDatabase(config\settings());
        return $db->runQuery($query);
    }

}

?>