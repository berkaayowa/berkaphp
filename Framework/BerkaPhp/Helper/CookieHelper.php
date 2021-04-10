<?php
namespace BerkaPhp\Helper;

class CookieHelper 
{

	
	function __construct()
	{
		# code...
	}

    /*
	* Creates an input field
	* @param  label of the input and an array of attributes
	* @return input field
	* @author berkaPhp
	*/
	public static function  set($cookie_name, $cookie_value, $number_of_day = 30) {
		setcookie($cookie_name, $cookie_value, time() + (86400 * $number_of_day), "/"); 
	}

    /*
	* Creates an input field
	* @param  label of the input and an array of attributes
	* @return input field
	* @author berkaPhp
	*/
	public static function delete($cookie_name) {
		setcookie($cookie_name, '', time() - 30);
	}

    /*
	* Creates an input field
	* @param  label of the input and an array of attributes
	* @return input field
	* @author berkaPhp
	*/
	public static function get($cookie_name) {
		if (isset($_COOKIE[$cookie_name])) {
			return $_COOKIE[$cookie_name];	 
		}
		return null;	
	}

}
?>