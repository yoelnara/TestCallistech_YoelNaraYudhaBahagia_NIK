<?php
require_once('config.php');
error_reporting( error_reporting() & ~E_NOTICE );
session_start();

$delete = $_GET['id'];

	$query = "DELETE from `customer` WHERE id=".$delete."";
	mysql_query($query);
	
	header("Location: xxx1.php");

?>