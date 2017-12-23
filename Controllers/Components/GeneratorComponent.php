<?php
namespace controller\component;
use berkaPhp\controller\component\BerkaPhpComponent;
use \berkaPhp\helpers;

class GeneratorComponent extends BerkaPhpComponent
{
	private $class_name;
	private $controller_path;
	private $model_path;
	private $view_path;
	private $primary_key;

	function __construct()
	{
		parent::__construct();
		$this->setName('Generator');
		$this->setAuthor('berkaPhp');
		$this->setDescription('');

		$this->controller_path = "Controllers/".\berkaPhp\helpers\Html::getCurrentPrefix(false)."/{name}Controller.php";
		$this->model_path = "Models/{name}Model.php";
		$this->view_path = "Views/".\berkaPhp\helpers\Html::getCurrentPrefix(false)."/{controller}/{view}.php";

	}

	function setClassName($class_name) {
		$this->class_name = $class_name;
	}

	function generateController() {

		$controller_with_path = str_replace('{name}', $this->class_name, $this->controller_path);
		return $this->writingFile($controller_with_path,$this->getControllerClass());

	}

	function generateModel() {

		$model_with_path = str_replace('{name}', $this->class_name, $this->model_path);
		return $this->writingFile($model_with_path, $this->getModelClass());

	}

	function generateViews() {
		$this->index();
		$this->add();
		$this->edit();
		$this->view();
	}

    public static function dbSettings($setting) {
        $template = file_get_contents('berkaPhp/template/SettingTemplate.txt');
        if(sizeof($setting) > 0) {

            foreach( $setting as $setting => $value) {
                $template = str_replace('{'.$setting.'}', $value, $template);
            }

        }
    }

	private function add() {
		$this->primary_key = $this->db->getPrimaryKey(strtolower($this->class_name));
		$add_view_path = str_replace('{controller}', $this->class_name, $this->view_path);
		$add_view_path = str_replace('{view}', 'add', $add_view_path);

		$add_template = file_get_contents('berkaPhp/template/AddTemplate.txt');

		$fields = $this->db->getTableFields(strtolower($this->class_name));

		$add_template = str_replace('{name}', $this->_($this->class_name), $add_template);
		$add_template = str_replace('{elements}', $this->getCreateBestInput($fields), $add_template);
		$add_template = str_replace('{controller_name}', strtolower($this->class_name), $add_template);

		return $this->writingFile($add_view_path,$add_template);

	}

    private function getCreateBestInput($fields, $withValue = false) {
        $inputs = '';

        foreach ($fields as $field => $type) {
            $input = '';
            $info = self::getColumnInfo($type);
            if($withValue) {
                $input = helpers\Form::inputs([['type'=>$info['type'], 'id'=> $field,'value'=>'<?=$data["'.$field.'"]?>', 'placeholder'=>$this->removeUnderscore($field), 'caption'=>$this->removeUnderscore($field)]]);
            } else {
                $input = helpers\Form::inputs([['type'=>$info['type'], 'id'=> $field, 'placeholder'=>$this->removeUnderscore($field), 'caption'=>$this->removeUnderscore($field)]]);
            }

            $inputs.=$input;
        }

        return $inputs;
    }

    private static function  getColumnInfo($type){

        $type = strtolower($type);
        $info = array();

        $start = strpos($type, "(");
        $end = strpos($type, ")");

        $length = 0;

        if($start !== false && $end !== false) {

            $length = substr($type, $start, $end);
            $length = str_replace("(", "", $length);
            $length = str_replace(")", "", $length);

            $length = (int) $length;

        }

        $info['length'] = $length;

        if(substr($type, 0, 3) == "int") {
            $info['type'] = 'numeric';
        } elseif (substr($type, 0, 7) == "varchar"){

            if($length > 300) {
                $info['type'] = 'textarea';
            } else {
                $info['type'] = 'text';
            }

        } elseif (strpos("blob", $type ) !== false ){
            $info['type'] = 'file';
        } elseif (substr($type, 0, 8) == 'datetime'){
            $info['type'] = 'datetime';
        } elseif (substr($type, 0, 4) == "time") {
            $info['type'] = 'time';
        } elseif (substr($type, 0, 4) == 'date' ){
            $info['type'] = 'date';
        }elseif (substr($type, 0, 3) == "bit" || substr($type, 0, 7) == "tinyint"){
            $info['type'] = 'checkbox';
        }

        return $info;
    }

	private function edit() {
		$this->primary_key = $this->db->getPrimaryKey(strtolower($this->class_name));
		$edit_view_path = str_replace('{controller}', $this->class_name, $this->view_path);
		$edit_view_path = str_replace('{view}', 'edit', $edit_view_path);

		$edit_template = file_get_contents('berkaPhp/template/EditTemplate.txt');
		$fields = $this->db->getTableFields(strtolower($this->class_name));

		$edit_template = str_replace('{name}', $this->_(strtolower($this->class_name)), $edit_template);
		$edit_template = str_replace('{elements}', $this->getCreateBestInput($fields, true), $edit_template);
		$edit_template = str_replace('{controller_name}', strtolower($this->class_name), $edit_template);
		$edit_template = str_replace('{primary_key}',$this->primary_key, $edit_template);

		return $this->writingFile($edit_view_path,$edit_template);
	}

	private function view() {
		$this->primary_key = $this->db->getPrimaryKey(strtolower($this->class_name));
		$edit_view_path = str_replace('{controller}', $this->class_name, $this->view_path);
		$edit_view_path = str_replace('{view}', 'view', $edit_view_path);

		$edit_template = file_get_contents('berkaPhp/template/ViewTemplate.txt');

		$fields = $this->db->getTableFields(strtolower($this->class_name));

		$edit_template = str_replace('{name}', $this->_(strtolower($this->class_name)), $edit_template);
		$edit_template = str_replace('{elements}', $this->getCreateBestInput($fields, true), $edit_template);
		$edit_template = str_replace('{controller_name}', strtolower($this->class_name), $edit_template);
		$edit_template = str_replace('{primary_key}',$this->primary_key, $edit_template);

		return $this->writingFile($edit_view_path,$edit_template);
	}

	private function index() {
		$this->primary_key = $this->db->getPrimaryKey(strtolower($this->class_name));
		$index_view_path = str_replace('{controller}', $this->class_name, $this->view_path);
		$index_view_path = str_replace('{view}', 'index', $index_view_path);

		$index_template = file_get_contents('berkaPhp/template/IndexTemplate.txt');

		$fields = $this->db->getTableFields(strtolower($this->class_name));

		$columns='';
		$elements ='';

		foreach ($fields as $field => $type) {
			$columns.="<th style='text-transform: capitalize;'>{$this->removeUnderscore($field)}</th>\n				";
			$elements.='<td data-limit-char="20"><?=$data["'.$field.'"]?></td>'."\n".'					';
		}

		$columns.='<th>Options</th>';

		$index_template = str_replace('{column_name}', $columns, $index_template);
		$index_template = str_replace('{body}', $elements, $index_template);
		$index_template = str_replace('{controller_name}', strtolower($this->class_name), $index_template);
		$index_template = str_replace('{primary_key}', $this->primary_key, $index_template);

		return $this->writingFile($index_view_path,$index_template);
	}

	private function getModelClass() {
		$this->primary_key = $this->db->getPrimaryKey(strtolower($this->class_name));
		$class_model = file_get_contents('berkaPhp/template/ModelTemplate.txt');
		$class_model = str_replace('{primary_key}',$this->primary_key, $class_model);
		$class_model = str_replace('{table_name}',strtolower($this->class_name), $class_model);
		$class_model = str_replace('{model_name}',$this->class_name, $class_model);

		return $class_model;
	}

	private function getControllerClass() {
		$this->primary_key = $this->db->getPrimaryKey(strtolower($this->class_name));
		$class_controller = file_get_contents('berkaPhp/template/ComtrollerTemplate.txt');
		$class_controller = str_replace('{name}',$this->_($this->class_name), $class_controller);
		$class_controller = str_replace('{names}',strtolower($this->class_name), $class_controller);
		$class_controller = str_replace('{controller_name}',$this->class_name, $class_controller);
		$class_controller = str_replace('{primary_key}',$this->primary_key, $class_controller);

		return $class_controller;
	}

	private function _($value) {
		$length = strlen($value);
		if($length > 3){
			if(substr($value, $length-3, $length) == 'ies') {
				$value = str_replace('ies', 'y', $value);
				return strtolower($value);
			} else {
				return strtolower(substr($value, 0, -1));
			}
		} elseif ($length < 4) {
			return strtolower($value);
		}
	}

	private function writingFile($path, $data) {
		if(!file_exists(dirname($path))) {
			mkdir(dirname($path), 0777, true);
		}

		$file = $path;
		$handle = fopen($file, 'w') or die('Cannot open file:  '.$file);
		//$data = $data;
		return (fwrite($handle, $data) != false ) ? true : false;
	}

	private function removeUnderscore($value) {

        $wrord = str_replace('_', ' ', $value);

        $result = preg_replace("([A-Z])", " $0", $wrord);
        $result = strtolower($result);
        $result = ucfirst($result);
//        $wrord = explode(' ', $result);
		return $result;
	}

	function getTables() {
		return $this->db->getTables();
	}

}

?>