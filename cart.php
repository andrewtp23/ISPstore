<?php
include "connect.php";
//Check if user wants to checkout or shop:
if(isset($_POST['checkout'])){
header("location:orders.php");
}
if(isset($_POST['shop'])){
header("location:paperdetail.php");
}
$PHPSESSID = session_id();
$showcart = "SELECT * FROM cart WHERE session_id = '".$PHPSESSID."'";
$result=mysql_query($showcart);

if(!$result){
$errmsg=mysql_error();
}else{
$num=mysql_num_rows($result);
$row=mysql_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Showcart</title>
<link rel="stylesheet" href="store.css">
</head>
<body>
<table width="100%" border="0">
  <tr>
    <td colspan="5"><h1>Shopping Cart </h1></td>
  </tr>
  <tr>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
  </tr>
  
  <tr>
    <td bgcolor="#ECE9D8"><strong>Paper Type</strong></td>
    <td bgcolor="#ECE9D8"><strong>Qty</strong></td>
    <td bgcolor="#ECE9D8"><strong>Price</strong></td>
    <td bgcolor="#ECE9D8"><strong>Total</strong></td>
    <td bgcolor="#ECE9D8"><strong>Action</strong></td>
  </tr>
   <?php
   $gtotal=0;
  for($row_num = 0; $row_num < $num; $row_num++){ 
  ?>
  <tr>
    <td><?php echo $row['name'];?></td>
    <td><?php echo $row['qty'];?></td>
    <td><?php echo "$".$row['price'];?></td>
    <td><?php
        $total= $row['qty'] * $row['price'];
        $ctotal= number_format($total,2);
        $gtotal = $gtotal + $ctotal;
        $_SESSION['gtotal'] = $gtotal;
        echo "$".$total;?></td>
    <td><a href="delete.php?cid=<?php echo $row['cart_id']?>">Remove</a></td>
  </tr>
  <?php 
  $row=mysql_fetch_assoc($result);
  } 
   ?>
   
   <tr>
   <td></td>
   <td></td>
   <td><strong>Grand Total:</strong></td>
   <td bgcolor="#ECE9D8"><strong><?php echo "$".$gtotal;?></strong></td>
      </tr>
   <form action="cart.php" method="post">
  <tr>
    <td><label></label></td>
    <td></td>
    <td><input type="submit" name="checkout" value="Check Out" /></td>
    <td><input type="submit" name="shop" value="Back to Shopping" /></td>
    <td> </td>
  </tr>
  </form>
  
  <tr>
  <td colspan="5">
  <p><?php echo $errmsg;?></p>
  </td>
  </tr>
  
</table>
</body>
</html>