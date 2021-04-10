<?php

namespace BerkaPhp\Helper;
/**
 * Created by PhpStorm.
 * User: berka
 * Date: 7/28/17
 * Time: 11:06 PM
 */
class Rand
{

    public static function uniqueDigit($min = null, $max = null)
    {
        if($min != null && $max != null) {
            return mt_rand($min, $max);
        } else {
            return mt_rand(1000000, 9999999);
        }       
    }


}

?>