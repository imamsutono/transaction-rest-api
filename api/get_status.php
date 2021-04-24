<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers");

	include_once '../config/database.php';
	include_once '../class/transaction.php';

	$database = new Database();
	$db = $database->getConnection();

	$item = new Transaction($db);

	$item->references_id = isset($_GET['references_id']) ? $_GET['references_id'] : die();
	$item->merchant_id = isset($_GET['merchant_id']) ? $_GET['merchant_id'] : die();

	$item->getStatus();

	if ($item->status != null) {
		// create array
		$emp_arr = array(
			"references_id" => $item->references_id,
			"invoice_id" => $item->invoice_id,
			"status" => $item->status
		);

		http_response_code(200);
		echo json_encode($emp_arr);
	} else {
		http_response_code(404);
		echo json_encode("Transaction not found.");
	}
