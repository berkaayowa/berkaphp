<?php
namespace berkaPhp\helpers;
/**
 * Created by PhpStorm.
 * User: Berka
 * Date: 5/14/2017
 * Time: 8:38 AM
 */

use \berkaPhp\helpers;

   class Auth {

       public function _construct() {

       }

       /*
       * add login session default name is user
       * @param user object
       * @param name of the user object optional
       * @return bool or null
       * @author berkaPhp Ayowa
       */

       public static function login($user, $name ="") {

           if(!self::isUserLogged()) {

               switch(empty($name)) {
                   case true:
                       return SessionHelper::add('user', $user);
                       break;
                   default:
                       return SessionHelper::add($name, $user);
               }

           }

           return false;
       }

       /*
       * removing user session logout
       * @param  user object name optional
       * @author berkaPhp
       */

       public static function logout($name = "") {

           switch(empty($name)) {
               case true:
                   SessionHelper::remove('user');
                   break;
               default:
                   SessionHelper::remove($name);
           }

       }

       /*
       * Checks if user is logged in
       * @return user object name optional
       * @author berkaPhp
       */

       public static function isUserLogged($name = ''){

           switch(empty($name)) {
               case true:
                   return SessionHelper::exist('user');
                   break;
               default:
                   return SessionHelper::exist($name);
           }

       }

       /*
       * Creates an input field
       * @param  label of the input and an array of attributes
       * @return input field
       * @author berkaPhp Ayowa
       */

       public static function isUseRole($role, $force_to_log = false, $name = '', $role_name = '') {

           $name = !empty($name) ? $name : 'user';
           $role_name = !empty($role_name) ? $role_name : 'role_name';

           if(self::isUserLogged()) {

              $actual_role = SessionHelper::get($name) ? SessionHelper::get($name)[$role_name] : "";
              return (strtolower($actual_role) == $role) ? true : false;

           } else {

               if(!$force_to_log) {
                   return false;
               } else {
                   RedirectHelper::redirect(LOGIN_URL);
               }

           }

       }

       /*
       * Creates an input field
       * @param  label of the input and an array of attributes
       * @return input field
       * @author berkaPhp Ayowa
       */

       public static function getActiveUser($force_to_log = false, $key = '', $name = '') {

           $name = !empty($name) ? $name : 'user';

           if(self::isUserLogged()) {

               if(!empty($key)) {
                   return isset(SessionHelper::get($name)[$key]) ? SessionHelper::get( $name)[$key] : null;
               }

               return (SessionHelper::exist($name)) ? SessionHelper::get($name) : null;

           } else {

               if($force_to_log) {
                   RedirectHelper::redirect(LOGIN_URL);
               } else {
                   return null;
               }

           }
       }
   }