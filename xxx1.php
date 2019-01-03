<?php
require_once('config.php');
error_reporting( error_reporting() & ~E_NOTICE );

$header = "<td style=\"padding: 15px;text-align: left;border-bottom: 1px solid #ddd;background-color: #f5f5f5\">";
$body = "<td style=\"padding: 15px;text-align: left;border-bottom: 1px solid #ddd;\">";
$idedit = $_GET['id'];

    $querygen = "SELECT `no.customer` FROM `customer` order by `no.customer` desc LIMIT 1";
	$sqlquery=mysql_query($querygen);
	
    if ($sqlquery) {
        $row = mysql_fetch_array($sqlquery);
        $value2 = $row['no.customer'];
        $value2 = substr($value2, 3, 5);
        $value2 = (int) $value2 + 1;
        $value2 = "CRM" . sprintf('%04s', $value2);
        $value = $value2;
    } else {
        $value2 = "CRM0001";
        $value = $value2;
    }

if(isset($idedit)){
	$ie='edit';
	$query2 = "select * from customer where id=".$idedit.";";
	$sqlquery=mysql_query($query2);
	$sql3=mysql_fetch_array($sqlquery);
	
	if($sql3!=''){
	$data1 = $sql3['id'];
	$value = $sql3['no.customer'];
	$data3 = $sql3['nama'];
	$data4 = $sql3['alamat'];
	$data5 = $sql3['no.telepon'];
	//$data5 = true;
}
}
?>

<html>
<body>
<?php
if($ie=='edit'){
	$customernumber=$value;
	echo "Editing Customer - ".$customernumber;
}else{
	$customernumber=$value;
	echo "Creating Customer - ".$customernumber;
}
?>
<form method="post" action="xxx2.php" enctype='multipart/form-data'>
<table>

<tr>
<td>Cust No</td>
<td><input style="color: #A9A9A9;" name="custno" type="text" id="custno" value="<?php echo $value;?>" readonly /></td>
</tr>

<tr>
<td>Name</td>
<td><input name="name" type="text" id="name" value="<?php echo $data3;?>"/></td>
</tr>

<tr>
<td>Phone</td>
<td><input name="phone" type="text" id="phone" value="<?php echo $data4;?>"/></td>
</tr>

<tr>
<td>Address</td>
<td><input name="address" type="text" id="address" value="<?php echo $data5;?>"/></td>
</tr>


<?php
if($ie=='edit'){
	echo '<input name="editor" type="hidden" id="editor" value="edit"/>';
	echo '<input name="idedit" type="hidden" id="idedit" value="'.$data1.'"/>';
}else{
	echo '<input name="editor" type="hidden" id="editor" value="input"/>';
	echo '<input name="idedit" type="hidden" id="idedit" value="'.$data1.'"/>';
}
?>

<tr>
<td></td>
<td><label>
<input type="submit" name="Submit" value="<?php
if($idedit!=''){
	echo 'Edit';
}elseif($edit==''){
	echo 'Simpan';
}

?>" />
<input name="batal" type="reset" id="batal" value="Reset" />
<?php
if($idedit!=''){
	echo '<button onclick="location.reload();">Input</button>';
}elseif($edit==''){}
?>
</label></td>
</tr>
</table>
</form>
<br><br>
<?php
$tampilbim="SELECT * FROM customer;";
$tampilbim2=mysql_query($tampilbim);
echo mysql_error();
echo"<TABLE border=\"0\" style=\"margin-left:0px;\"><tr>";
$c=0;
while($tampilbimrow=mysql_fetch_array($tampilbim2)){

if($c==0){
echo $header."No</td>";
echo $header."Cust No</td>";
echo $header."Name</td>";
echo $header."Address</td>";
echo $header."Phone</td>";
echo $header."Edit</td>";
echo $header."Delete</td>";
}
$c=$c+1;
echo"<tr>";
echo $body.$c."</td>";
echo $body.$tampilbimrow['no.customer']."</td>";
echo $body.$tampilbimrow['nama']."</td>";
echo $body.$tampilbimrow['alamat']."</td>";
echo $body.$tampilbimrow['no.telepon']."</td>";
echo "<td style=\"padding: 15px;text-align: left;border-bottom: 1px solid #ddd;\"><a href=\"xxx1.php?id=$tampilbimrow[id]\">E</a></td>";
echo "<td style=\"padding: 15px;text-align: left;border-bottom: 1px solid #ddd;\"><a href=\"xxx3.php?id=$tampilbimrow[id]&actid=2\">D</a></td>";
echo"</tr>";
}
?>
</table>
</body>
</html>