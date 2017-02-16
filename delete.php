<?php
include "connect.php";
$PHPSESSID=session_id();
//clean variable
if(isset($_GET['cid'])){
$cleancid = mysql_escape_string($_GET['cid']);
$removefromcart="delete FROM cart WHERE cart_id='".$cleancid."'";
mysql_query($removefromcart);
header("location:cart.php");
}else{
//display error
header("location:errorpage.php?errorno=1");
}
?>