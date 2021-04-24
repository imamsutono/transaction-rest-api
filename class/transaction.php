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
			
		}

		public function getStatus() {

		}
	}