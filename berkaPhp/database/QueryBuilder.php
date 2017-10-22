<?php
namespace berkaPhp\database;
use \berkaPhp\helpers\Str;

class QueryBuilder {

	private $table_name;
	public static $select;
	public static $from;

	function __construct($table_name)
	{
		 $this->table_name = $table_name;;
	}

	public static function select($table_name, $primary_key, $contains, $prams = array(), $keys = array(), $joinable = array()) {

        $query = self::_build_select($table_name, $params);
        $query = self::_run_join($table_name, $query, $contains, $keys, $joinable);

		return self::_insert_params($query, $prams);
	}

	public static function select_where($table_name, $primary_key, $contains, $params = array(), $keys = array(), $joinable = array()) {

		$query = self::_build_select($table_name, $params);
        $query = self::_run_join($table_name, $query, $contains, $keys, $joinable);

		return self::_insert_params($query, $params);

	}

	public static function select_by($table_name, $primary_key, $contains, $params = array(), $keys = array(), $joinable = array()) {

        $query = self::_build_select($table_name, $params);
        $query = self::_run_join($table_name, $query, $contains, $keys, $joinable);
		return self::_insert_params($query, $params);

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

	public static function select_like($table_name, $primary_key, $contains, $params = array(), $keys = array(), $joinable = array()) {

        $query = self::_build_select($table_name, $params);
        $query = self::_run_join($table_name, $query, $contains, $keys, $joinable);

		return self::_insert_params($query, $params, 'LIKE');
	}

	public static function add($table_name, $data_table) {

		$count = 0;
		$length = sizeof($data_table);
        $table = array();

		$values = '(';

		$query = "INSERT INTO {$table_name} (";

		foreach ($data_table as $field => $value) {

            $table['fields'][] = $value;

			if($count == $length - 1 ) {

				$query.= $field.')';
                $values.= '?)';

			} else {

				$query.= $field.', ';
                $values.= '?,';

			}

			$count++;

		}

        $query.= ' VALUES '.$values;
        $table['query'] = $query;

		return $table;

	}

	public static function update($table_name, $data_table, $primary_key, $params = array()) {

		$primary_key_value = '';

        $count = 0;
        $length = sizeof($data_table);
        $table = array();

        $query = "UPDATE  {$table_name} SET ";

        foreach ($data_table as $field => $value) {

            if($field != $primary_key) {
                $table['fields'][] = $value;
            }

            if($count == $length - 1 ) {
                if($field != $primary_key) {
                    $query.= $field." =? ";
                }

            } else {
                if($field != $primary_key) {
                    $query.= $field." = ?, ";
                }
            }

            if($field == $primary_key) {
                $primary_key_value = $value;
            }

            $count++;

        }

        if(!isset($params['fields']))  {
            $query = self::_insert_params($query, ['fields'=>[$primary_key=>$primary_key_value]], 'WHERE')['query'];
        }

        array_push($table['fields'], $primary_key_value);
        $table['query'] = $query;

		return $table;
	}

	public static function delete($table_name,$value,$primary_key) {
		return "DELETE FROM {$table_name} WHERE {$primary_key} = {$value}";
	}

    private static function _insert_params($query = '', $params, $operation = '') {

        if(!empty($operation)) {
            $object = self::_extract_param_fields($query, $params, $operation);
        } else {
            $object = self::_extract_param_fields($query, $params);
        }

        if (isset($params['options'])) {

            $length = sizeof($params['options']);

            if($length > 0) {

                foreach ($params['options'] as $option => $value) {

                    if(strtolower($option) == 'limit') {

                        array_push($object['fields'], $value[0]);
                        array_push($object['fields'], $value[1]);

                        $object['query'].= ' '.strtoupper($option)." ?,? ";

                    } else if(strtolower($option) == 'order by') {

                        $object['query'].= ' '.strtoupper($option)." ".Str::dbEscapeString($value[0])." ".Str::dbEscapeString(strtoupper($value[1]));

                    }

                }

            }

        }

        return $object;
    }

    private static function _extract_param_fields($query = '', $params, $operation='') {

        $object = array();

        if (isset($params['fields'])) {

            $length = sizeof($params['fields']);
            $count = 0;

            if($length > 0){

                $query.=" WHERE ";
                foreach ($params['fields'] as $param => $value) {

                    $count++;

                    switch($operation) {
                        case "LIKE":
                            $object['fields'][] = "%".$value."%";
                            break;
                        default:
                            $object['fields'][] = $value;

                    }

                    if($count < $length) {

                        switch($operation) {
                            case "LIKE":
                                $query.= " OR ".$param." LIKE ? ";
                                break;
                            default:
                                $query.= ' '.$param."= ? AND ";

                        }

                    } elseif ($count == $length) {

                        switch($operation) {
                            case "LIKE":
                                $query.= $param." LIKE ?";
                                break;
                            default:
                                $query.= $param." = ? ";

                        }

                    }

                }

            }

            $object['query'] = $query;

            return $object;

        } else {
            return $query;
        }


    }

    private static function _join_table($table_name, $type = '', $query = '', $contains = array(), $keys = array()) {

        if(sizeof($contains) > 0) {

            foreach ($contains as $foreign_table_name => $foreign_key) {

                if(sizeof($keys) > 0) {

                    foreach ($keys as $table => $key) {
                        if ($foreign_table_name == $table) {
                            if($foreign_table_name[0] == '@'){
                                $query .= ' ' . $type . ' ' . str_replace('@','',$foreign_table_name) . ' ON '
                                     . $key . '=' . $foreign_key;
                            }else {
                                $query .= ' ' . $type . ' ' . $foreign_table_name . ' ON '
                                    . $table_name . '.' . $key . '=' . $foreign_table_name . '.' . $foreign_key;
                            }
                        }
                    }

                } else {
                    die("on Join Keys can't be empty");
                }

            }
        } else {
            die("on Join Contains can't be empty");
        }

        return $query;
    }

    private static function _run_join($table_name, $query = '', $contains, $keys, $joinable = array()) {

        if(sizeof($joinable) > 0) {

            $type = isset($joinable['type']) ? $joinable['type'] : "LEFT JOIN";
            $join = isset($joinable['join']) ? $joinable['join'] : true;

            if($join) {
                $query = self::_join_table($table_name, $type, $query, $contains, $keys);
            }

        }

        return $query;

    }

    private static function _build_select($table_name, &$params) {

        $select = isset($params['select']) ? implode(", ",$params['select']) : '*';
        $query = "SELECT ".$select." FROM {$table_name}";

        if($select != '*') {
            unset($params['select']);
        }

        return $query;

    }

}

?>