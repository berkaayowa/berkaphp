<?php
namespace controller\component;
require_once('AutoLoader.php');
use autoload\AppClassLoader;
AppClassLoader::loadBaseComponent();

class InstallerComponent
{

    function __construct()
    {

    }

    public static function db_settings($setting) {

        $template = file_get_contents('berkaPhp/template/SettingTemplate.txt');
        if(sizeof($setting) > 0) {
            foreach( $setting as $setting => $value) {
                $template = str_replace('{'.$setting.'}', $value, $template);
            }
            return \berkaPhp\helpers\FileStream::write_file("berkaPhp/config/try.php",  $template);
        }
        return false;
    }

}

?>