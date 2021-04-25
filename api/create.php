<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Method: POST");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

	include_once '../config/database.php';
	include_once '../class/transaction.php';

	$database = new Database();
	$db = $database->getConnection();

	$item = new Transaction($db);

	$data = json_decode(file_get_contents("php://input"));

	$item->invoice_id = $data->invoice_id;
	$item->merchant_id = $data->merchant_id;
	$item->item_name = $data->item_name;
	$item->amount = $data->amount;
	$item->payment_type = $data->payment_type;
	$item->number_va = $data->number_va;
	$item->customer_name = $data->customer_name;

	if ($item->createTransaction()) {
		$arr = array(
			"references_id" => $item->references_id,
			"number_va" => $item->number_va,
			"status" => $item->status
		);
		echo json_encode($arr);
	} else {
		echo "Transaction could not be created";
	}
