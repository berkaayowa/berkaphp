<?php
namespace berkaPhp\helpers;

class Str {

    /*
	* Creates an input field
	* @param  label of the input and an array of attributes
	* @return input field
	* @author berkaPhp Ayowa
	*/
   public static function limit_char($value, $number, $x = '') {
       return !empty($value) ? substr($value, 0, $number).$x : '';
   }

}

?>
