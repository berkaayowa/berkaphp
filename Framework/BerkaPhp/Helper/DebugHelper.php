<?php
/**
 * Created by PhpStorm.
 * User: Berka
 * Date: 2018/07/22
 * Time: 12:54
 */

namespace BerkaPhp\Helper;

class Debug{


    public static function PrintOut($data, $stop = true, $msg = '')
    {
        print("<pre>");
        print_r($data);
        print("</pre>");

        if($stop)
            die($msg);
    }

}