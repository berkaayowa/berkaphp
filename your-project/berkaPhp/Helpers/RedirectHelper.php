<?php
namespace berkaPhp\helpers;

class RedirectHelper {

    /*
	* Creates an input field
	* @param  label of the input and an array of attributes
	* @return input field
	* @author berkaPhp Ayowa
	*/
   public static  function redirect($url, $permanent = false) {
        if (headers_sent() === false) {
            header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
        }
        exit();
    }

}

?>

