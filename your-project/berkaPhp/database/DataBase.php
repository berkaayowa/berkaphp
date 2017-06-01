<?php
	namespace berkaPhp\database;

	class MySqlDatabase
	{
		private $db_connection;
		function __construct($db_details) {
			$this->db_connection = new \mysqli(
				$db_details['server'],
				$db_details['username'],
				$db_details['password'],
				$db_details['dbname']
			);

			if ($this->db_connection->connect_error) {
				die("Connection failed: " . $this->$db_connection->connect_error);
			} else {
				//echo "stri";
			}

			$this->db_connection->set_charset('utf8');
		}
			/**
	 * fetches all data from database
	 * @access public
	 * @param  [$query] query to be executed
	 * @return [array] array of customers
	 * @author berkaPhp
	 */
		public function fetch($query) {
			$data = array();
			$result = $this->db_connection->query($query);
			if ($result->num_rows > 0) {
				while($row= $result->fetch_assoc()) {
						$data[] = $row;
				}
			}
			//var_dump(json_encode($data));exit();
			return $data;
		}

	/**
	 * updates , adds data to the database
	 * return true if successfully executed
	 * else false
	 * @access public
	 * @param [$query] query to be executed
	 * @return [boolean] true or false
	 * @author berkaPhp
	 */
		public function update($query) {
			if (!$this->db_connection->query($query)) {
				return false;
			}
			return true;
		}
	/**
	 * gets a query and returns number of rows
	 * @access public
	 * @param [$query] query to be executed
	 * @return [integer]
	 * @author berkaPhp
	 */
		public function count($query) {
			$result = $this->db_connection->query($query);
			return $result->num_rows;
		}

		public function object() {
			return $this->db_connection;
		}

		function get_primary_key($table) {
			$result = $this->db_connection->query("SHOW INDEX FROM {$table} WHERE Key_name = 'PRIMARY'");
			if ($result->num_rows > 0) {
				$row= $result->fetch_assoc();

			}
			return $row['Column_name'];
		}

		function get_table_fields($table_name) {
			$fileds = $this->db_connection->query('DESCRIBE '.$table_name);
			$table_fields;

			foreach ($fileds as $field => $value) {
				$table_fields[$value['Field']] = $value['Type'];
			}

			return $table_fields;
		}

		function get_tables() {
			 $result = $this->db_connection->query("SHOW TABLES");
			 $tableList;
			 if ($result->num_rows > 0) {
			 	while($ccurrent_row = mysqli_fetch_array($result))
				{
					$tableList[] = $ccurrent_row[0];
				}
			 	return $tableList;
			 }
			 return null;
		}
	}
?>