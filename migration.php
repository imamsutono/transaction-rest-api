<?php
	if (!isset($_SERVER['argv'][1])) {
		die("You must provide table name");
	}

	$table_name = $_SERVER['argv'][1];
	$filename = "migration/". $table_name .".php";

	if (file_exists($filename)) {
		die("Table ". $table_name ." already exists");
	}

	$myfile = fopen($filename, "w") or die("Unable to open file!");

	$txt = "<?php\n";
	$txt .= "include_once 'config/database.php';\n";
	$txt .= "include_once 'class/migration.php';\n\n";
	$txt .= '$database = new Database();'."\n";
	$txt .= '$db = $database->getConnection();'."\n";
	$txt .= '$migration = new Migration($db);'."\n\n";
	$txt .= '$column = define column here;'."\n";
	$txt .= '$migration->create("'. $table_name .'", $column);'."\n";

	try {
		fwrite($myfile, $txt);
		fclose($myfile);	
	} catch(Exception $e) {
		echo "Failed making migration: ". $e->getMessage();
	}
