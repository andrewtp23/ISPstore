 <?php
ob_start();
include "connect.php";

$PHPSESSID = session_id();
$cbID=mysql_escape_string($_POST['bid']);
$cqty=mysql_escape_string($_POST['qty']);
$cname = mysql_escape_string($_POST['cn']);
$cprice = mysql_escape_string($_POST['cp']);

if(!$err){

$addtocart="INSERT INTO cart SET session_id='".$PHPSESSID."', bid = '".$cbID."', qty='".$cqty."', price ='".$cprice."', name ='".$cname."' ";

mysql_query($addtocart);
header("location:cart.php");
exit;
}
else{
	header("location:paperdetail.php");
}
ob_end_flush()
?>