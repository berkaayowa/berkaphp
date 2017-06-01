<?php
namespace berkaPhp\helpers;

class Html {

    /*
	* Creates an input field
	* @param  label of the input and an array of attributes
	* @return input field
	* @author berkaPhp Ayowa
	*/
    public static function input($label = "", $options = array() ) {
        $length = sizeof($options);
        $input = "<input ";

        if ($length > 0) {
            foreach ($options as $option => $value) {
                $input.=" {$option}='{$value}' ";
            }
        }

        if(empty($label)) {
            return $input.="/>";
        } else {
            return $input.="/>".self::label($label)."<br>";
        }

    }

    /*
	* Creates a label
	* @param  label
    * @param  an array of attributes optional
	* @return an label
	* @author berkaPhp Ayowa
	*/
    public static function label($label,  $options = array()) {

        $option_length = sizeof($options);
        $_label = "<label";

        if($option_length> 0) {

            foreach($options as $option => $value) {

                if(end($options) == $option) {
                    $_label.= '>';
                } else {
                    $_label.= ' '.$option. '=' . $value;
                }

            }

        }
        $_label.='>';

        return $_label.$label.'</label>';
    }

    /*
	* Creates a select tag with options
	* @param  label optional
    * @param  id required
    * @param  data source array option tags optional
    * @param  array of attributes optional
	* @return full select tag
	* @author berkaPhp Ayowa
	*/
    public static function select($label = "", $id,  $data = array(), $options) {
        $_label = self::label($label);
        $i_select= "<select id='{$id}' name='{$id}' ";
        $i_option = '';
        $selected = isset($options['selected']) ? $options['selected'] : '';

        $length = sizeof($data);
        $option_length = sizeof($options);

        if($option_length > 0) {

            foreach($options as $_option => $values) {
                if($_option != 'selected' && $_option != 'value' && $_option != 'text' ) {
                    $i_select.=" {$_option} ='{$values}''";
                }
            }

        }

        if($length > 0) {

           foreach($data as $data_option) {
               $i_option.='<option value ='.$data_option[$options['value']].'>'.$data_option[$options['text']].'</option>';
           }

        } else {
            $i_option.='<option></option>';
        }

        return $_label.$i_select.'>'.$i_option.'</select>';
    }

    /*
	* Creates a textarea
	* @param  label optional
    * @param  text  optional
    * @param  array of attributes optional
	* @return full textarea tag
	* @author berkaPhp Ayowa
	*/
    public static function textarea($label = "", $data = false,  $options) {
        $length = sizeof($options);
        $textarea = "<textarea";

        if ($length > 0) {
            foreach ($options as $option => $value) {
                $textarea.=" {$option}='{$value}' ";
            }
        }

        if(empty($data)) {
          return $textarea.="></textarea>";
        } else {
            return $textarea.=">{$data}</textarea>";
        }

    }

    /*
	* Creates a button
	* @param  text value on the button
    * @param  array of attributes  optional
    * @param  icon on the button optional
	* @return button
	* @author berkaPhp Ayowa
	*/
    public static function button($text, $options, $icon = false, $prefix = false) {

        $length = sizeof($options);
        $button = "<button";
        $link = ['is_link'=>false,'href'=>''];

        if ($length > 0) {
            foreach ($options as $option => $value) {
                if(strtolower($option) == 'href') {
                   $link['is_link'] = true;
                    if($prefix == false) {
                        $link['href'] = '/'.self::get_current_prefix().$value;
                    } else {
                        $link['href'] = $value;
                    }

                } else {
                    $button.=" {$option}='{$value}' ";
                }
            }

            $button.= " type='button' ";
        }

        if($icon != false) {
            $_icon= "<span class ='{$icon}'></span>";
            $button.=">{$_icon}{$text}</button>";
        } else {
            $button.=">{$text}</button>";
        }

        switch($link['is_link']) {
            case true:
                return "<a href='{$link['href']}'>{$button}</a>";
                break;
            case false:
                return $button;
                break;
        }
    }

    /*
	* Creates a link
	* @param  text value on link
    * @param  array of attributes  optional
	* @return a link
	* @author berkaPhp Ayowa
	*/
    public static function link($text = "", $options = array() , $icon = false) {

        $option_length = sizeof($options);
        $link = "<a";

        if($option_length> 0) {

            foreach($options as $option => $value) {
                if($option == 'href') {
                    $value='/'. self::get_current_prefix().$value;
                }
                $link.= ' '.$option. '=' . $value;
            }

        }

        $_icon = !empty($icon) ? "<i class='".$icon."'></i>" : '';
        return "{$link}>{$_icon} {$text}</a>";
    }

    public static function action($link) {
        return '/'.self::get_current_prefix().$link;
    }

    private static function get_current_prefix() {
        return strtolower(PREFIX);
    }

}





?>


