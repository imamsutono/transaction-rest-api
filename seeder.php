<?php
	include_once 'config/database.php';
	include_once 'class/seeder.php';

	$table_name = $_SERVER['argv'][1];
	$data = $_SERVER['argv'][2];

	if (!isset($table_name)) {
		die("You must provide table name as first parameter");
	}

	if (!isset($data)) {
		die("You must provide data as second parameter");
	}

	$database = new Database();
	$db = $database->getConnection();
	$seeder = new Seeder($db);

	$seeder->db_table = $table_name;
	$seeder->data = $data;

	$seeder->insertData();
