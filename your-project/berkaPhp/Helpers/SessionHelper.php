<?php
namespace berkaPhp\helpers;

class SessionHelper 
{
	
	function __construct()
	{
		# code...
	}


    /*
	* Creates an input field
	* @param  label of the input and an array of attributes
	* @return input field
	* @author berkaPhp Ayowa
	*/
	public function start() {
		session_start();
	}

    /*
	* Creates an input field
	* @param  label of the input and an array of attributes
	* @return input field
	* @author berkaPhp Ayowa
	*/
	public function add($key, $value) {
		if (!isset($_SESSION)) {
			session_start();
		}
		$_SESSION[$key] = $value;
		return ($_SESSION[$key] == $value) ? true : false;
	}

    /*
	* Creates an input field
	* @param  label of the input and an array of attributes
	* @return input field
	* @author berkaPhp Ayowa
	*/
	public function remove($key) {
		if (!isset($_SESSION)) {
			session_start();
		}

		$value_to_remove = $_SESSION[$key];
		return (array_shift($_SESSION[$key]) == $value_to_remove) ? true : false;	 
	}

    public static  function update($key, $value) {
        if (!isset($_SESSION)) {
            session_start();
        }

        $_SESSION[$key] = $value;

    }

    /*
	* Creates an input field
	* @param  label of the input and an array of attributes
	* @return input field
	* @author berkaPhp Ayowa
	*/
	public function get($key) {
		if (!isset($_SESSION)) {
			session_start();
		}
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];	 
		}
		return null;
		
	}

    public static function _get($key) {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return null;
    }

    /*
	* Creates an input field
	* @param  label of the input and an array of attributes
	* @return input field
	* @author berkaPhp Ayowa
	*/
	public function kill() {
		session_destroy();
	}

    public static function routing($prefix = '') {
        if(!empty($prefix)) {
            $current_prefix = self::_get('prefix');
            //echo $current_prefix;
            if($current_prefix != $prefix) {
                self::update('prefix', $prefix);
                //self::add('prefix', $prefix);
            }
        } else {
           return self::_get('prefix');
        }

    }
}
?>