<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json; charset=UTF-8");
	header("Access-Control-Allow-Method: PUT");
	header("Access-Control-Max-Age: 3600");
	header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

	include_once 'config/database.php';
	include_once 'class/transaction.php';

	$database = new Database();
	$db = $database->getConnection();

	$item = new Transaction($db);
	$item->references_id = $_SERVER['argv'][1];
	$item->status = $_SERVER['argv'][2];

	if ($item->changeStatus()) {
		$arr = array(
			"references_id" => $item->references_id,
			"status" => $item->status
		);
		echo json_encode($arr);
	} else {
		echo "Update transaction status failed";
	}
