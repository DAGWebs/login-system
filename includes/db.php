<?php  
	require_once "config.php";

	//this exstracts the mysqli connect function
	//simple and maybe not nessary, but fun to do
	function connect($host, $user, $pass, $db) {
		return mysqli_connect($host, $user, $pass, $db);
	}

	//exstracts the mysql escape function 
	//take a string and runs the function
	//makes preventing mysql injection easier to prevent
	function escape($string) {
		global $con;
		return mysqli_real_escape_string($con, $string);
	}

	//queries a database
	//takes the default function and makes it easier to use
	function query($sql) {
		global $con;
		return mysqli_query($con, $sql);
	}

	//counts the rows found from a query
	//takes the default function and makes it easier to use
	function rows($query) {
		return mysqli_num_rows($query);
	}

	//pulls the associative array out
	//takes the default function and makes it easier to use
	function assoc($query) {
		return mysqli_fetch_assoc($query);
	}

	//pulls out an array basicaly the same function as above, but named differently
	//takes the default function and makes it easier to use
	function getArray($query) {
		return mysqli_fetch_array($query);
	}

	//allows you to confirm that a query went through
	//custom function that takes a result of a query and will give you a reason for failur
	function confirm($result) {
		global $con;
		if($result) {
			die("Query Failed: " . mysqli_error($con));
		}
	}

	$connection['db_host'] = $mysql['host'];
	$connection['db_user'] = $mysql['username'];
	$connection['db_pass'] = $mysql['password'];
	$connection['db_name'] = $mysql['database'];

	foreach($connection as $connectionPart => $value) {
		define(strtoupper($connectionPart), $value);
	}

	$con = connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

	if(!$con) {
		echo "Connection could not be made with: ";
		echo "<br>";
		echo "Database Host: " . DB_HOST;
		echo "<br>";
		echo "Database username: " . DB_USER;
		echo "<br>";
		echo "Database password: " . DB_PASS;
		echo "<br>";
		echo "Database name: " . DB_NAME;
		echo "<br>";
		echo "Please double check your credintials you can change them in the Config.php located in the includes folder.";
	}
?>