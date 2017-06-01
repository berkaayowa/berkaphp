<?php
namespace berkaPhp\helpers;

class Table {

    /*
	* Creates an input field
	* @param  label of the input and an array of attributes
	* @return input field
	* @author berkaPhp Ayowa
	*/

    private $table ;
    private $table_heading;
    private $table_row;
    private $table_column;

    function __construct() {
        $this->table = '<table>{heading}{rows}</table>';
        $this->table_heading = '<th>{@}</th>';
        $this->table_column = '<td>{@}</td>';
        $this->table_row = '<tr>{@}</tr>';
    }

    /*
	* Creates a label
	* @param  label
    * @param  an array of attributes optional
	* @return an label
	* @author berkaPhp Ayowa
	*/

    public function set_heading($headings) {

        if(sizeof($headings) > 0) {
            $_heading = '';
            foreach($headings as $heading) {
                $_heading.= str_replace('{@}',$heading,$this->table_heading);
            }
            $this->table_heading = $_heading;
        } else {

        }

    }

    public function set_body($values, $options = null) {

        if(sizeof($values) > 0) {

            $_row = '';
            $is_action_set = false;


            foreach($values as $value) {

                $_col = '';

                foreach($value as $_key => $val) {

                    if(sizeof($options) > 0) {
                        if(isset($options[$_key])) {
                            foreach($options[$_key] as $option => $_val) {
                                if($option == 'limit') {
                                    $val = \berkaPhp\helpers\Str::limit_char($val, $_val, '...');
                                    $_col.= str_replace('{@}',$val,$this->table_column);
                                }
                            }
                        }

                        if(!isset($options[$_key]) && isset($options['actions'])) {
                            $param = '';
                            $is_action_set = true;
                            $_actions = '';

                            foreach($options['actions'] as $action => $link) {

                                if(strpos($link, "{".$_key."}")) {
                                   $link = str_replace("{".$_key."}", $val, $link);
                                    $_actions.= \berkaPhp\helpers\Html::button($action,['class'=>'btn btn-secondary', "href"=>$link]);
                                    //$_col.= str_replace('{@}',$_actions,$this->table_column);
                                }
                            }

                        }

                        if(!isset($options[$_key])) {
                            $_col.= str_replace('{@}',$val,$this->table_column);
                        }

                    } else {
                        $_col.= str_replace('{@}',$val,$this->table_column);
                    }
                }

//                if($is_action_set) {
//                    $_col.= str_replace('{@}',$_actions,$this->table_column);
//                }

                $_row.= str_replace('{@}', $_col,$this->table_row);
            }

            $this->table_row = $_row;

        } else {

        }

    }

    public function build() {
        $this->table = str_replace('{heading}', $this->table_heading, $this->table);
        $this->table = str_replace('{rows}', $this->table_row, $this->table);
        return $this->table;
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


