<?php
namespace BerkaPhp\Helper;
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

    public static function crawlerDetect($USER_AGENT){

        $crawlers = array(
            array('Google', 'Google'),
            array('plus.google.com', 'Google'),
            array('plus', 'Google'),
            array('crawler', 'crawler'),
            array('spider', 'spider'),
            array('curl', 'curl'),
            array('bot', 'bot'),
            array('slurp', 'slurp'),
            array('fetch', 'fetch'),
            array('googlebot', 'Google'),
            array('msnbot', 'MSN'),
            array('Rambler', 'Rambler'),
            array('Yahoo', 'Yahoo'),
            array('AbachoBOT', 'AbachoBOT'),
            array('accoona', 'Accoona'),
            array('AcoiRobot', 'AcoiRobot'),
            array('ASPSeek', 'ASPSeek'),
            array('CrocCrawler', 'CrocCrawler'),
            array('Dumbot', 'Dumbot'),
            array('FAST-WebCrawler', 'FAST-WebCrawler'),
            array('GeonaBot', 'GeonaBot'),
            array('Gigabot', 'Gigabot'),
            array('Lycos', 'Lycos spider'),
            array('MSRBOT', 'MSRBOT'),
            array('Scooter', 'Altavista robot'),
            array('AltaVista', 'Altavista robot'),
            array('IDBot', 'ID-Search Bot'),
            array('eStyle', 'eStyle Bot'),
            array('Scrubby', 'Scrubby robot'),
            array('facebook', 'facebook'),
            array('twitter', 'twitter')
        );

        foreach ($crawlers as $c)
        {
            if (stristr($USER_AGENT, $c[0]))
            {
                return($c[1]);
            }
        }

        return false;
    }
}

?>