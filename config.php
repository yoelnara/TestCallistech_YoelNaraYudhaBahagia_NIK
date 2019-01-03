<?php
$dbhost= '127.0.0.1:';
$dbuser= 'root';
$dbpass= '123456';
$conn= mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn)
{
die('Could not connect: ' . mysql_error());
}
mysql_select_db("customer") or die(mysql_error());
?>