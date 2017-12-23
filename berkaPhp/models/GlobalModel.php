<?php
/**
 * Created by PhpStorm.
 * User: berka
 * Date: 7/21/17
 * Time: 1:00 AM
 */

namespace berkaPhp\model;
use \berkaPhp\database\MySqlDatabase;
use \berkaPhp\config;

class GlobalModel {

    public static function runQuery($query) {
        $results = self::initDatabase()->runQuery($query);
        return $results;
    }

    private static function initDatabase() {
        return new MySqlDatabase(config\settings());
    }

}

?>