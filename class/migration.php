<?php
	class Migration {
		private $conn;
		public $db_table;
		public $db_column;
		public $create_table_query;

		public function __construct($db) {
			$this->conn = $db;
			$this->create_table_query = "CREATE TABLE ";
		}

		public function create($table, $raw_columns) {
			$query = "CREATE TABLE ". $table . "(". $raw_columns .")";
			$stmt = $this->conn->prepare($query);

			if ($stmt->execute()) {
				return true;
			}
			return false;
		}

		public function drop() {
			$query = "DROP TABLE ". $this->db_table;
			$stmt = $this->conn->prepare($query);

			if ($stmt->execute()) {
				return true;
			}
			return false;
		}

		public function column($column) {
			$this->db_column = $this->db_column . $table_name;
			return $this;
		}
	}