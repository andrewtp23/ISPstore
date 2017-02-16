 <?php
include "connect.php";
$PHPSESSID=session_id();
if(isset($_POST['submit'])){
$order_name = mysql_escape_string($_POST['o_name']);
$order_address = mysql_escape_string($_POST['address']);
$order_total = mysql_escape_string($_POST['total']);
$order_shipcost = mysql_escape_string($_POST['shipcost']);
$order_date = mysql_escape_string($_POST['o_date']);
$order_status = mysql_escape_string($_POST['status']);
$order_card = mysql_escape_string($_POST['card']);
$order_num = mysql_escape_string($_POST['o_card']);
$addorder="INSERT INTO orders SET order_name='".$order_name."',order_address='".$order_address."',";
$addorder .="order_total='".$order_total."', order_date='".$order_date."',order_status='".$order_status."',session='".$PHPSESSID."',shipping_cost='".$order_shipcost."'";
$result =mysql_query($addorder);
if(!$result){
$msg=mysql_error();
}else{
$msg="Your order has been processed";
}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Shipping</title>
<link rel="stylesheet" href="store.css">
</head>
<body>
<table width="100%" border="0">
  <tr>
    <td colspan="2"><h1>Dunder Mifflin - Order Checkout </h1></td>
  </tr>
  <?php if(!isset($msg)) {?>
   <form action="orders.php" method="post">
  <tr>
    <td width="16%">Name</td>
    <td width="84%"><label>
      <input name="o_name" type="text" size="40" />
    </label></td>
  </tr>
  <tr>
    <td valign="top">Address</td>
    <td><label>
      <textarea name="address"></textarea>
    </label></td>
  </tr>
  <tr>
    <td>Total</td>
    <td><label>
      <input name="total" type="text" size="40" value="<?php echo $_SESSION['gtotal']?>"/>
    </label></td>
  </tr>
  <tr>
    <td>Shipping Cost </td>
    <td><label>
      <input name="shipcost" type="text" size="40" value="$5.00"/>
    </label></td>
  </tr>
  <tr>
    <td>Status</td>
    <td><label>
    <select name="status">
      <option>processed</option>
      <option>pending</option>
    </select>
    </label></td>
  </tr>
  <tr>
	<td>Credit/Debit Card</td>
	<td><label><select name= "card">
		<option>VISA</option>
		<option>Mastercard</option>
	</select>
	</label></td>
  </tr>
  <tr>
	<td width="16%">Card Number</td>
    <td width="84%"><label>
      <input name="o_card" type="text" size="40" />
    </label></td>
  </tr>
  <tr>
    <td><label>
      <input type="submit" name="submit" value="Send Order" />
    </label></td>
  </tr>
   </form>
   <?php
   }else{
      ?>
      <tr>
      <td>
      <?php echo $msg; ?>
      </td>
      </tr>
<?php } ?>
</table>
</body>
</html>