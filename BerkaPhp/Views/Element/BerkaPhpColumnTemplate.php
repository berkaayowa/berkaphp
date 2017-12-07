<?php
/**
 * Created by PhpStorm.
 * User: berka
 * Date: 2017/11/24
 * Time: 00:30
 */
namespace berkaPhp\views\elment;
use berkaPhp\model\column\BerkaPhpColumn;

class BerkaPhpColumnTemplate {
    public static function text($column) {
        $element = '<div class="form-group">
                        <label for="'.$column->getLabel().'">Name:</label>
                        <input type="text" class="form-control" id="'.$column->getName().'" name="'.$column->getName().'">
                    </div>';
    }

    public static function number($column) {

    }

    public static function check($column) {

    }

    public static function radio($column) {

    }

    public static function date($column) {

    }
}
?>