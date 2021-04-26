<?php
	class Seeder {
		private $conn;
		public $db_table;
		public $data;

		public function __construct($db) {
			$this->conn = $db;
		}

		private function generateColumn($keys) {
			$result = "";

			foreach ($keys as $item) {
				$result .= $item .'=:'. $item .',';
			}
			return substr($result, 0, -1);
		}

		public function insertData() {
			try {
				$data_decode = json_decode($this->data, true);
				$keys = array_keys($data_decode);
				$column = $this->generateColumn($keys);

				$query = "INSERT INTO ". $this->db_table ." SET ". $column;

				$stmt = $this->conn->prepare($query);

				foreach ($keys as $item) {
					$stmt->bindParam(':'. $item, $data_decode[$item]);
				}

				$stmt->execute();
			} catch(Exception $e) {
				echo "Failed to insert data: ". $e->getMessage();
			}
		}
	}
