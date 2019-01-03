<?php
require_once('config.php');
error_reporting( error_reporting() & ~E_NOTICE );

$custno = $_POST['custno'];
$nama = $_POST['name'];
$telepon = $_POST['phone'];
$alamat = $_POST['address'];

$editor = $_POST['editor'];
$idedit = $_POST['idedit'];




if($editor=='input'){
	echo $custno."#".$nama."#".$telepon."#".$alamat."#".$editor;
	
	$query = "INSERT INTO `customer`(`no.customer`,`nama`,`alamat`,`no.telepon`) VALUES ('".$custno."','".$nama."','".$alamat."','".$telepon."')";
	mysql_query($query);
	
	header("Location: xxx1.php");
}

if($editor=='edit'){
	echo $custno."#".$nama."#".$telepon."#".$alamat."#".$editor."#".$idedit;
	
	$query = "UPDATE `customer` SET 
	`no.customer`='".$custno."',
	`nama`='".$nama."',
	`alamat`='".$alamat."',
	`no.telepon`='".$telepon."'
	WHERE id='".$idedit."'";
	mysql_query($query);
	header("Location: xxx1.php");
}

echo "<br>".$query;
?>