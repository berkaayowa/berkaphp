<?php

namespace berkaPhp\helpers;
/**
 * Created by PhpStorm.
 * User: berka
 * Date: 2017/12/02
 * Time: 03:36
 */

class Form {

    public static function Create($inputs, $submit = array()) {

        $outPutForm = '<form class="form">{formContent}{button}</form>';
        $outPut = '';

        $submitBtn = ' <div class="form-group row">
                          <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">{text}</button>
                          </div>
                        </div>';

        if(sizeof($submit) > 0) {
            if(isset($submit['text'])) {
                $submitBtn = str_replace('{text}', $submit['text'], $submitBtn);
            } else {

            }
        } else {
            $submitBtn = str_replace('{text}', 'Submit', $submitBtn);
        }

        if(sizeof($inputs) >0) {
            foreach($inputs as $input) {
                $outPut.= self::getInputTemplate($input);
            }
        }

        $outPutForm = str_replace('{formContent}', $outPut, $outPutForm);
        $outPutForm = str_replace('{button}', $submitBtn, $outPutForm);

        return $outPutForm;

    }

    public static function inputs($inputs) {

        $outPut = "";

        if(sizeof($inputs) >0) {
            foreach($inputs as $input) {
                $outPut.= self::getInputTemplate($input);
            }
        }

        return $outPut;

    }

    private static function getInputTemplate($element) {

        $wrapper = '
            <div class="form-group row">
                <label class="control-label col-sm-2" for="{id}">{caption}</label>
                <div class="col-sm-10">
                    {input}
                </div>
            </div>
        ';

        $input = self::getInput($element);
        unset($element['type']);

        if(isset($element['caption'])) {
            $wrapper = str_replace('{caption}', $element['caption'], $wrapper);
            unset($element['caption']);
        }

        $customAttribute = '';

        foreach($element as $attribute => $value) {
            if($attribute == 'id') {
                $customAttribute.='name="'.$value.'" '.$attribute.'="'.$value.'"';
                $wrapper = str_replace('{id}', $value, $wrapper);
            } else if($attribute == 'class') {
                $input = str_replace('{class}', $value, $input);
            } else {
                $customAttribute.=' '.$attribute.'="'.$value.'"';
            }
        }

        $input = str_replace('{attributes}', $customAttribute, $input);
        $wrapper = str_replace('{input}', $input, $wrapper);

        return $wrapper;
    }

    private static function getInput($element) {
        switch($element['type']) {
            case 'text':
                return '<input type="text" class="form-control {class}" {attributes}>';
                break;
            case 'email':
                return '<input type="text" class="form-control {class}" {attributes}>';
                break;
            case 'password':
                return '<input type="password" class="form-control {class}" {attributes}>';
                break;
            case 'textarea':
                return '<textarea class="form-control {class}" {attributes}></textarea>';
                break;

        }
    }
}

?>