<?php
namespace controller\component;

class InstallerComponent
{

    function __construct()
    {

    }

    public static function dbSettings($setting) {

        $template = file_get_contents('berkaPhp/template/SettingTemplate.txt');
        if(sizeof($setting) > 0) {
            foreach( $setting as $setting => $value) {
                $template = str_replace('{'.$setting.'}', $value, $template);
            }
            return \berkaPhp\helpers\FileStream::writeFile("berkaPhp/config/Settings.php",  $template);
        }
        return false;
    }

}

?>