<?php
	class Transaction {
		// connection
		private $conn;

		// table
		private $db_table = "transaction";

		// columns
		public $invoice_id;
		public $merchant_id;
		public $status;
		public $item_name;
		public $amount;
		public $payment_type;
		public $number_va;
		public $customer_name;

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

			$stmt->bindParam(":invoice_id", $this->invoice_id);
			$stmt->bindParam(":merchant_id", $this->merchant_id);
			$stmt->bindParam(":item_name", $this->item_name);
			$stmt->bindParam(":amount", $this->amount);
			$stmt->bindParam(":payment_type", $this->payment_type);
			$stmt->bindParam(":number_va", $this->number_va);
			$stmt->bindParam(":customer_name", $this->customer_name);

			if ($stmt->execute()) {
				return true;
			}
			return false;
		}

		public function getStatus() {

		}
	}