<?php
include_once 'config/database.php';
include_once 'class/migration.php';

$database = new Database();
$db = $database->getConnection();
$migration = new Migration($db);

$migration->create("detail", define column here)