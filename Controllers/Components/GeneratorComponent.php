<?php
namespace controller\component;
use berkaPhp\controller\component\AppComponent;

class GeneratorComponent extends AppComponent
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
		$this->model_path = "Models/{name}Table.php";
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
		return $this->writingFile($model_with_path,$this->getModelClass());

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
		$inputs = '';

		foreach ($fields as $field => $type) {
			$inputs.="<label style='text-transform: capitalize;'>{$this->removeUnderscore($field)}</label><br>\n	";
			$inputs.="<input type='text' class='form-control' name='".$field."' placeholder='".$this->removeUnderscore($field)."'><br>\n	";
		}

		$add_template = str_replace('{name}', $this->_($this->class_name), $add_template);
		$add_template = str_replace('{elements}', $inputs, $add_template);
		$add_template = str_replace('{controller_name}', strtolower($this->class_name), $add_template);

		return $this->writingFile($add_view_path,$add_template);

	}

	private function edit() {
		$this->primary_key = $this->db->getPrimaryKey(strtolower($this->class_name));
		$edit_view_path = str_replace('{controller}', $this->class_name, $this->view_path);
		$edit_view_path = str_replace('{view}', 'edit', $edit_view_path);

		$edit_template = file_get_contents('berkaPhp/template/EditTemplate.txt');

		$fields = $this->db->getTableFields(strtolower($this->class_name));
		$inputs = '';

		foreach ($fields as $field => $type) {
			if($field != $this->primary_key){
				$inputs.="<label style='text-transform: capitalize;'>{$this->removeUnderscore($field)}</label><br>\n	";
				$inputs.='<input type="text" class="form-control" name="'.$field.'" value="<?=$data["'.$field.'"]?>"><br>'."\n	";
			}
		}

		$edit_template = str_replace('{name}', $this->_(strtolower($this->class_name)), $edit_template);
		$edit_template = str_replace('{elements}', $inputs, $edit_template);
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
		$inputs = '';

		foreach ($fields as $field => $type) {
			if($field != $this->primary_key){
				$inputs.="<label style='text-transform: capitalize;'>{$this->removeUnderscore($field)}</label><br>\n	";
				$inputs.='<input type="text" readonly class="form-control" name="'.$field.'" value="<?=$data["'.$field.'"]?>"><br>'."\n	";
			}
		}

		$edit_template = str_replace('{name}', $this->_(strtolower($this->class_name)), $edit_template);
		$edit_template = str_replace('{elements}', $inputs, $edit_template);
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
		if ($wrord = str_replace('_', ' ', $value)) {
			return $wrord;
		}
		return $value;
	}

	function getTables() {
		return $this->db->getTables();
	}

}

?>