<?php
	namespace berkaPhp\database;

	class MySqlDatabase
	{
		private $db_connection;
		function __construct($db_details) {

            if(!IS_DB_CONNECTED){
                \berkaPhp\helpers\RedirectHelper::redirect('/errors/dbnotconnected');
            }

			$this->db_connection = new \mysqli(
				$db_details['server'],
				$db_details['username'],
				$db_details['password'],
				$db_details['dbname']
			);

			if ($this->db_connection->connect_error) {
				die("Connection failed: " . $this->$db_connection->connect_error);
			} else {

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

			return $data;
		}

        public function fetchWithPrepare($option) {

            $data = null;

            if ($stmt = $this->db_connection->prepare($option['query'])) {

                $fields = isset($option['fields']) ? $option['fields'] : array();
                $num_of_fields = sizeof($fields);
                $types = str_repeat("s", $num_of_fields);

                $bind = array();

                if($num_of_fields > 0) {

                    foreach($fields as $key => $value ) {
                        $bind[$key] = &$fields[$key];
                    }

                    array_unshift($bind, $types);
                    call_user_func_array(array($stmt, 'bind_param'), $bind);

                }

                /* execute query */
                if($stmt->execute()) {
                    $result = $stmt->get_result();
                    if ($result->num_rows > 0) {
                        while($row= $result->fetch_assoc()) {
                            $data[] = $row;
                        }
                    }
                }

                $stmt->close();

                return $data;
            }

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

        public function updateWithPrepare($option) {

            if ($stmt = $this->db_connection->prepare($option['query'])) {

                $fields = isset($option['fields']) ? $option['fields'] : array();
                $num_of_fields = sizeof($fields);
                $types = str_repeat("s", $num_of_fields);

                $bind = array();

                if($num_of_fields > 0) {

                    foreach($fields as $key => $value ) {
                        $bind[$key] = &$fields[$key];
                    }

                    array_unshift($bind, $types);
                    call_user_func_array(array($stmt, 'bind_param'), $bind);

                }

                /* execute query */
                $stmt->execute();
                $feedback = ($stmt->affected_rows > 0) ? true : false;
                $stmt->close();

                return $feedback;

            }

            return null;

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

		function getPrimaryKey($table) {
			$result = $this->db_connection->query("SHOW INDEX FROM {$table} WHERE Key_name = 'PRIMARY'");
			if ($result->num_rows > 0) {
				$row= $result->fetch_assoc();

			}
			return $row['Column_name'];
		}

		function getTableFields($table_name) {
			$fileds = $this->db_connection->query('DESCRIBE '.$table_name);
			$table_fields='';

			foreach ($fileds as $field => $value) {
				$table_fields[$value['Field']] = $value['Type'];
			}

			return $table_fields;
		}

		function getTables() {
			 $result = $this->db_connection->query("SHOW TABLES");
			 $tableList = '';
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