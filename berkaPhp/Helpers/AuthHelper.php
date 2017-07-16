<?php
namespace berkaPhp\helpers;
/**
 * Created by PhpStorm.
 * User: Berka
 * Date: 5/14/2017
 * Time: 8:38 AM
 */

   class Auth {
       public function _construct() {

       }

       public static function isUserLogged(){
           return isset(\berkaPhp\helpers\SessionHelper::_get('user')[0]) ? true : false;
       }

       public static function isUserAdmin() {
           $role = null;
           if(self::isUserLogged()) {
               $role = isset(\berkaPhp\helpers\SessionHelper::_get('user')[0]) ? \berkaPhp\helpers\SessionHelper::_get('user')[0]['role_name'] : "";
               return (strtolower($role) == 'admin') ? true : false;
           } else {
               \berkaPhp\helpers\RedirectHelper::redirect('/users/login');
           }
       }

       public static function getActiveUser($key = '', $force_to_log = true) {
           if(self::isUserLogged()) {
               if(!empty($key)) {
                   return isset(\berkaPhp\helpers\SessionHelper::_get('user')[0][$key]) ? \berkaPhp\helpers\SessionHelper::_get('user')[0][$key] : "";
               }
               return isset(\berkaPhp\helpers\SessionHelper::_get('user')[0]) ? \berkaPhp\helpers\SessionHelper::_get('user')[0] : "";
           } else {
               if($force_to_log) {
                  \berkaPhp\helpers\RedirectHelper::redirect('/users/login');
               } else {
                   return '';
               }
           }
       }
   }