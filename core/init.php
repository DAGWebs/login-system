<?php  
	ob_start();
	session_start();
	require_once "includes/config.php";
	require_once "includes/functions.php";
	require_once "includes/db.php";

	$page = $_SERVER["PHP_SELF"];
?>