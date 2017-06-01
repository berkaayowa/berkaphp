<?php
namespace berkaPhp\database;

class QueryBuilder {
	private $table_name;
	public static $select;
	public static $from;


	function __construct($table_name)
	{
		 $this->table_name = $table_name;;
	}

	public static function select($table_name, $primary_key, $contains, $prams = array(), $keys = array()) {
		$query = "SELECT * FROM {$table_name}";

		if(!isset($contains)) {

		} else {
			foreach ($contains as $foreign_table_name => $foreign_key) {
				foreach ($keys as $table => $key) {
					if ($foreign_table_name == $table) {
						$query.= ' LEFT JOIN '.$foreign_table_name.' ON '
						.$table_name.'.'.$key.'='.$foreign_table_name.'.'.$foreign_key;
					}
				}

			}
		}

		if (isset($prams)) {
			$length = sizeof($prams);
			$count = 0;

			foreach ($prams as $pram => $value) {
				$count++;
				if($count < $length) {
					$query.= ' '.$pram." ".$value." ";
				} elseif ($count == $length) {
					$query.= $pram." ".$value."";
				}
			}
		}
		return $query;
	}

	public static function select_where($table_name, $primary_key, $contains, $prams = array(), $keys = array()) {
		$query = "SELECT * FROM {$table_name}";

		if(!isset($contains)) {

		} else {
			foreach ($contains as $foreign_table_name => $foreign_key) {
				foreach ($keys as $table => $key) {
					if ($foreign_table_name == $table) {
						$query.= ' LEFT JOIN '.$foreign_table_name.' ON '
						.$table_name.'.'.$key.'='.$foreign_table_name.'.'.$foreign_key;
					}
				}

			}
		}

		if (isset($prams)) {
			$length = sizeof($prams);
			$count = 0;

			$query.= ' WHERE ';
			foreach ($prams as $pram => $value) {
				$count++;
				if($count < $length) {
					$query.= ' '.$pram."='".$value."' AND ";
				} elseif ($count == $length) {
					$query.= ' '.$pram."='".$value."' ";
				}
			}
		}

		return $query;
	}

	public static function select_by($table_name,$tags, $primary_key, $contains) {
		$base_query = self::select($table_name,$primary_key, $contains);
		$query= $base_query." WHERE ";
			if (empty($tags) || !isset($tags)) {
				die('empty tag');
			} else {
				$length = 0;
				$count = 0;
				foreach ($tags as $columna) {
					$length++;
				}
				foreach ($tags as $column => $value) {
					$count++;
					if($count < $length) {
						$query.= $column."='".$value."' AND ";
					} elseif ($count == $length) {
						$query.= $column."='".$value."'";
					}
				}
			}
			//var_dump($query);exit();
		return $query;
	}

	public static function single_table_select_like($table_name,$columns,$value) {
		$count=0;
		$query = "SELECT * FROM {$table_name} WHERE ";

		foreach ($columns as $column => $type) {
			if ($count == 0) {
				$query.= $column." LIKE '%{$value}%' ";
			} else {
				$query.= " OR ".$column." LIKE '%{$value}%' ";
			}

			$count++;
		}
		return $query;
	}

	public static function select_like($table_name, $primary_key, $contains, $prams = array(), $keys = array()) {
		$query = "SELECT * FROM {$table_name}";

		if(!isset($contains)) {

		} else {
			foreach ($contains as $foreign_table_name => $foreign_key) {
				foreach ($keys as $table => $key) {
					if ($foreign_table_name == $table) {
						$query.= ' LEFT JOIN '.$foreign_table_name.' ON '
						.$table_name.'.'.$key.'='.$foreign_table_name.'.'.$foreign_key;
					}
				}

			}
		}

		if (isset($prams)) {
			$query.= " WHERE ";
			$length = sizeof($prams);
			$count = 0;

			foreach ($prams as $pram => $value) {
				if($count < $length) {
					$query.= $pram." LIKE '%{$value}%' ";
				} else {
					$query.= " OR ".$pram." LIKE '%{$value}%' ";
				}
				$count++;
			}
		}
		return $query;
	}

	public static function add($table_name, $data_table) {
		$count = 0;
		$length = sizeof($data_table);

		$vaules = '(';

		$query = "INSERT INTO {$table_name} (";

		foreach ($data_table as $field => $value) {
			if($count == $length - 1 ) {
				$query.= $field.')';
				$type = trim(gettype($value));
				if($type == 'integer' || $type == 'bool') {
					$vaules.= "{$value})";
				} else {
					$vaules.= "'{$value}')";
				}
			}
			else {
				$query.= $field.', ';
				$type = trim(gettype($value));
				if($type == 'integer' || $type == 'bool') {
					$vaules.= "{$value}, ";
				} else {
					$vaules.= "'{$value}', ";
				}
			}
			$count++;
		}
		return $query.= ' VALUES '.$vaules;
	}

	public static function update($table_name, $data_table,$primary_key) {
		$count = 0;
		$length = sizeof($data_table);
		$primary_key_value;

		$query = "UPDATE  {$table_name} SET ";

		foreach ($data_table as $field => $value) {

			if($count == $length - 1 ) {

				$type = trim(gettype($value));

				if($type == 'integer' || $type == 'bool') {
					$query.= $field.' = '.$value;
				} else {
					$query.= $field."='$value'";
				}

			}
			else {

				$type = trim(gettype($value));

				if($type == 'integer' || $type == 'bool') {
					$query.= $field.' = '.$value.' ,';
				} else {
					$query.= $field." ='{$value}' ,";
				}
			}

			if($field == $primary_key) {
				$primary_key_value = $value;
			}

			$count++;
		}

		$query.= ' WHERE '.$primary_key.' = '.$primary_key_value;

		///var_dump($query);exit();
		return $query;
	}

	public static function delete($table_name,$value,$primary_key) {
		return "DELETE FROM {$table_name} WHERE {$primary_key} = {$value}";
	}
}

?>