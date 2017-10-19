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
	public static function add($key, $value) {
		self::startSession();
		
		if(is_array($_SESSION[$key])) {
            array_push($_SESSION[$key], $value);
        } else {
            $_SESSION[$key] = $value;
        }
	}

    /*
	* Creates an input field
	* @param  label of the input and an array of attributes
	* @return input field
	* @author berkaPhp Ayowa
	*/
	public static function remove($key) {
        self::startSession();
		unset($_SESSION[$key]);
	}

    public static  function update($key, $value) {
        self::startSession();
        $_SESSION[$key] = $value;

    }

    /*
	* Creates an input field
	* @param  label of the input and an array of attributes
	* @return input field
	* @author berkaPhp Ayowa
	*/
	public static function get($key) {
        self::startSession();
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];	 
		}
		return null;
		
	}

    public static function _get($key) {
        self::startSession();
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        return null;
    }

    public static function exist($key) {
        self::startSession();
        return isset($_SESSION[$key]);
    }

    /*
	* Creates an input field
	* @param  label of the input and an array of attributes
	* @return input field
	* @author berkaPhp Ayowa
	*/
	public static function kill() {
		self::startSession();
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

    public static function startSession() {
        if (!isset($_SESSION)) {
            session_start();
        }
    }
}
?>