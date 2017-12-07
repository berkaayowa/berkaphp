<?php
	namespace berkaPhp\model;
	use berkaPhp\database\QueryBuilder;

	interface Model {
		public function fetchAll();
		public function fetchBy($tags);
		public function update($data);
	}

	class BerkaPhpModel implements Model
	{
		protected $table_name;
		protected $primary_key;
		protected $contains;
		protected $validate;
		private $db;
		private $query;
		private $result;
		protected $keys;

		function __construct($value)
		{
			$this->db = new \berkaPhp\database\MySqlDatabase(\berkaPhp\config\settings());
			$this->contains = null;
			$this->table_name = $value;
		}

		/* fetches all data from database
		* @access public
		* @param  [$query] array f parameters
		* @return [array] array of data fetched from DB
		* @author berkaPhp
		*/
		public function fetchAll($params = [], $join = array()) {
			$data = $this->beforeFetch(array('params'=>$params, 'join'=>$join));
			$this->query = QueryBuilder::select($this->table_name, $this->primary_key, $this->contains, $data['params'], $this->keys, $data['join']);
			$this->result = $this->db->fetchWithPrepare($this->query);
			
			return $this->afterFetch($this->result);
		}

		public function fetchWhere($params = [], $join = array()) {
            $data = $this->beforeFetch(array('params'=>$params, 'join'=>$join));
			$this->query = QueryBuilder::select_where($this->table_name, $this->primary_key, $this->contains, $data['params'], $this->keys, $data['join']);
			$this->result = $this->db->fetchWithPrepare($this->query);

			return $this->afterFetch($this->result);
		}

		/* fetches all data from database
		* that match conditions in tags
		* @access public
		* @param  [$query] array f conditions
		* @return [array] array of data fetched from DB
		* @author berkaPhp
		*/
		public function fetchBy($params, $join = array()) {
            $data = $this->beforeFetch(array('params'=>$params, 'join'=>$join));
			$this->query = QueryBuilder::select_by($this->table_name, $this->primary_key, $this->contains, $data['params'], $this->keys, $data['join']);
			$this->result = $this->db->fetchWithPrepare($this->query);
			return $this->afterFetch($this->result);
		}

		/* fetches all data from database
		* that matches conditions like in tag
		* @access public
		* @param  [$query] array f conditions
		* @return [array] array of data fetched from DB
		* @author berkaPhp
		*/
		public function fetchLike($params, $join = array()) {
            $data = $this->beforeFetch(array('params'=>$params, 'join'=>$join));
			$this->query = QueryBuilder::select_like($this->table_name, $this->primary_key, $this->contains, $data['params'], $this->keys, $data['join']);
			$this->result = $this->db->fetchWithPrepare($this->query);
			return $this->afterFetch($this->result);
		}

		/* Add data into database
		* @access public
		* @param  [$query] array f data to be added
		* @return [array] true or false
		* @author berkaPhp
		*/
		public function add($data) {

			$data_table = $this->beforeSave($this->filterData($data));
			$this->query = QueryBuilder::add($this->table_name, $data_table);
			$result = $this->afterSave($this->db->updateWithPrepare($this->query));

			return $result;
		}

		/* Update data in database
		* @access public
		* @param array f fields and
		* vaule to be updated
		* @return [array] true or false
		* @author berkaPhp
		*/
		public function update($data, $params = array()) {

			$data_table = $this->beforeUpdate($this->filterData($data));
            $data_table = $this->beforeSave($data_table);
			$this->query = QueryBuilder::update($this->table_name, $data_table, $this->primary_key, $params);
			$result = $this->afterUpdate($this->db->updateWithPrepare($this->query));

			return $result;
		}

		/* delete data from database
		* @access public
		* @param  value to search for deleting
		* @return true or false
		* @author berkaPhp
		*/
		public function delete($value) {

			$value = $this->beforeDelete($value);
			$this->query = QueryBuilder::delete($this->table_name, $value, $this->primary_key);

			return $this->afterDelete($this->db->update($this->query));
		}

		/* fetches all table fields
		* @access public
		* @return array of fields
		* @author berkaPhp
		*/
		public function fields() {
			return $this->db->getTableFields($this->table_name);
		}

		/* filter data to be sent to database
		* checks if data mathe the table fields
		* type
		* @access private
		* @param  array of data to be validated
		* @return [array] array of validated data
		* @author berkaPhp
		*/
		private function filterData($data) {

			$table = $this->fields();
			$validated_data = null;
			foreach ($table as $field => $type) {
				if(array_key_exists($field,$data)) {
					if(substr($type,0,3) == 'int') {
						$validated_data[$field] = (int)$data[$field];
					} else {
						$validated_data[$field] = $data[$field];
					}
				}
			}
			if ($validated_data == null) {
				die('Error empty filter data does not match table fields');
			}

			return $validated_data;

		}

		/* get number of rows from the table
		* @return integer number of rows
		* @author berkaPhp
		*/
		public function numOfRows() {
			$this->result->num_rows;
		}

        public function _fetchBy($params, $join = array()) {
			$this->query = QueryBuilder::select_by($this->table_name, $this->primary_key, $this->contains, $params, $this->keys, $join);
            return $this->db->fetchWithPrepare($this->query);
        }

        public function countRows() {
            $this->result->num_rows;
		}
		
		protected function beforeSave($data) {
			return $data;
		}

		protected function afterSave($result) {
			return $result;
		}

		protected function beforeFetch($data) {
			return $data;
		}

		protected function afterFetch($data) {
			return $data;
		}

		protected function beforeUpdate($data) {
			return $data;
		}

		protected function afterUpdate($data) {
			return $data;
		}

		protected function beforeDelete($data) {
			return $data;
		}

		protected function afterDelete($data) {
			return $data;
		}

	}
?>