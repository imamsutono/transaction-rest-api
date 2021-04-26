<?php
	include_once 'config/database.php';
	include_once 'class/migration.php';

	$database = new Database();
	$db = $database->getConnection();
	$migration = new Migration($db);
	$table = 'invoice';
	$create = $migration->create(
		$table,
		'id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		firstname VARCHAR(30) NOT NULL,
		lastname VARCHAR(30) NOT NULL,
		email VARCHAR(50),
		reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
	);

	if ($create) {
		echo "Table ". $table ." successfully created";
	} else {
		echo "Table ". $table ." can not be created";
	}
