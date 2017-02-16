 <?php
include "connect.php";

$query ="SELECT * from Store";
$results=mysql_query($query);

if($results){
$num = mysql_num_rows($results);
$row=mysql_fetch_assoc($results);
}
//results
else{
//there's a query error
$error=true;
$errormsg .=mysql_error();
}


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;" />
<title>Paper Detail</title>
<link rel="stylesheet" href="store.css">
</head>
<body>
<table width="100%" border="0">
  <tr>
    <td colspan="3"><h1>Dunder Mifflin </h1></td>
  </tr>
  <?php for($row_num = 0; $row_num < $num; $row_num++){ ?>
  <tr>
    <td colspan="3"><hr /></td>
  </tr>
  <tr>
	<th rowspan="3"><img src="<?php echo $row['img_src'];?>" /></th>
	<td><strong><font size = '5'><u>Type:</u></font></strong></td>
	<td><?php echo $row['Name'];?></td>
	</tr>
  
 <tr>
    <td><strong>Price:</strong></td>
    <td><?php echo "$".$row['Price'];?></td>
  </tr>
  <tr>
    <td><strong>Length:</strong></td>
    <td><?php echo $row['Length'];?> "</td>
  </tr>
  <tr>
  <td><br /></td>
    <td><strong>Width: </strong></td>
    <td><?php echo $row['Width'];?> "</td>
  </tr>
   <tr>
   <td><br /></td>
    <td><strong>Color: </strong></td>
    <td><?php echo $row['Color'];?></td>
  </tr>
   <tr>
   <td><br /></td>
    <td><strong>Page Count: </strong></td>
    <td><?php echo $row['Page_Count'];?></td>
  </tr>

  <form action="addtocart.php" method="post">
  <tr>
    <td><br /></td>
    <td><strong>Quantity</strong></td>
    <td><label>
     <select name="qty">;
<?php
  $bid = $row['SKU'];
  for($i=1; $i<12; $i++) {
 echo '<option value='.$i.'>'.$i.'</option>';
     }
?>
 </select>
    </label>
   </td>
    <input name="bid" type="hidden" value="<?php echo $row['SKU']?>" /></td>
	</td>
    <input name="cn" type="hidden" value="<?php echo $row['Name']?>" /></td>
	</td>
    <input name="cp" type="hidden" value="<?php echo $row['Price']?>" /></td>
  </tr>
  <tr>
    <td> </td>
    <td> </td>
    <td><label>
      <input type="submit" name="submit" value="Add to Cart" />
    </label></td>
  </tr>
  </form>
  <?php 
  $row=mysql_fetch_assoc($results);
  } ?>
</table>
</body>
</html>