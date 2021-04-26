<?php
	class Migration {
		private $conn;

		public function __construct($db) {
			$this->conn = $db;
		}

		public function create($table, $raw_columns) {
			$query = "CREATE TABLE ". $table . "(". $raw_columns .")";
			$stmt = $this->conn->prepare($query);

			if ($stmt->execute()) {
				echo "Table ". $table ." successfully created\n";
			} else {
				echo "Table ". $table ." can not be created\n";
			}
		}
	}
