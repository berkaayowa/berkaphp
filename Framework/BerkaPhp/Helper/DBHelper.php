<?php

namespace BerkaPhp\Helper;

/**
 * Created by PhpStorm.
 * User: berka
 * Date: 7/29/17
 * Time: 1:18 AM
 */

class DB {

    public static function extractRows($db_result) {

        $data = null;

        if ($db_result != null && $db_result->num_rows > 0) {
            while($row= $db_result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;

    }

}

?>