<?php
	class Transaction {
		// connection
		private $conn;

		// table
		private $db_table = "transaction";

		// columns
		public $references_id;
		public $invoice_id;
		public $merchant_id;
		public $status;
		public $item_name;
		public $amount;
		public $payment_type;
		public $number_va;
		public $customer_name;

		private $default_status = "pending";

		public function __construct($db) {
			$this->conn = $db;
		}

		public function createTransaction() {
			$query = "INSERT INTO ". $this->db_table ."
					  SET
					  invoice_id = :invoice_id,
					  merchant_id = :merchant_id,
					  item_name = :item_name,
					  amount = :amount,
					  payment_type = :payment_type,
					  number_va = :number_va,
					  customer_name = :customer_name";

			$stmt = $this->conn->prepare($query);

			$this->invoice_id = htmlspecialchars(strip_tags($this->invoice_id));
			$this->merchant_id = htmlspecialchars(strip_tags($this->merchant_id));
			$this->item_name = htmlspecialchars(strip_tags($this->item_name));
			$this->amount = htmlspecialchars(strip_tags($this->amount));
			$this->payment_type = htmlspecialchars(strip_tags($this->payment_type));
			$this->number_va = htmlspecialchars(strip_tags($this->number_va));
			$this->customer_name = htmlspecialchars(strip_tags($this->customer_name));
			$this->status = $this->default_status;

			$stmt->bindParam(":invoice_id", $this->invoice_id);
			$stmt->bindParam(":merchant_id", $this->merchant_id);
			$stmt->bindParam(":item_name", $this->item_name);
			$stmt->bindParam(":amount", $this->amount);
			$stmt->bindParam(":payment_type", $this->payment_type);
			$stmt->bindParam(":number_va", $this->number_va);
			$stmt->bindParam(":customer_name", $this->customer_name);

			if ($stmt->execute()) {
				$this->references_id = $this->conn->lastInsertId();
				return true;
			}
			return false;
		}

		public function getStatus() {
			$query = "SELECT references_id, invoice_id, status
					  FROM ". $this->db_table ."
					  WHERE references_id = ?
					  LIMIT 0,1";

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1, $this->references_id);
			$stmt->execute();

			$dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

			$this->references_id = $dataRow['references_id'];
			$this->invoice_id = $dataRow['invoice_id'];
			$this->status = $dataRow['status'];
		}

		public function changeStatus() {
			$query = "UPDATE ". $this->db_table ."
					  SET status = :status
					  WHERE references_id = :references_id";

			$stmt = $this->conn->prepare($query);

			$this->status = htmlspecialchars(strip_tags($this->status));
			$this->references_id = htmlspecialchars(strip_tags($this->references_id));

			$stmt->bindParam(":status", $this->status);
			$stmt->bindParam(":references_id", $this->references_id);

			if ($stmt->execute()) {
				return true;
			}
			return false;
		}
	}
