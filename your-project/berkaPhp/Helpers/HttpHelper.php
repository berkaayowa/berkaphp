<?php
namespace berkaPhp\helpers;
/**
 * Created by PhpStorm.
 * User: berka
 * Date: 7/15/17
 * Time: 8:28 PM
 */

class Http {

    function getIpAddress() {

        $ip_keys = array(
            'HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR',
            'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP',
            'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR'
        );

        foreach ($ip_keys as $key) {

            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    // trim for safety measures
                    $ip = trim($ip);
                    // attempt to validate IP
                    if (self::validateIp($ip)) {
                        return $ip;
                    }
                }
            }
        }

        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : false;
    }
    /**
     * Ensures an ip address is both a valid IP and does not fall within
     * a private network range.
     */
    private static function  validateIp($ip)
    {
        /*if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
            return false;
        }*/
        return true;
    }
}

?>