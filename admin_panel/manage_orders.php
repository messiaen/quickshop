<?php include 'admin_session.php'; ?>

<html>
	<head>
		<!--Include template file-->
	<?php include 'header_template.php' ?>
	
	<title>Manage Orders</title>
	</head>
	<body>
		<!--Include template file-->
	<?php include 'body_template.php'?>

<?php>

//include files and establish db link
include_once '../models/Model.php';

$conn = new DatabaseLink();

$rows = Model::dbGetAll("client_orders", $conn);
?>
	<!--Create table to list all orders-->
<div class = 'row'><div class = 'span12'>
<table class = 'table table-bordered table-hover'>

<tr>
<th>Process</th>
<th>Order #</th>
<th>Customer</th>
<th>Cred Card Last 4</th>
<th>Quantity</th>
<th>Total</th>
<th>Tracking #</th>
<th>Current Status</th>
</tr>

<tbody>
<form name = "process_order" action = "process_orders.php" method = "POST">

<?php
//fetch all orders from the db
while($row = mysql_fetch_assoc($rows)){
		
		
		echo "<tr>";
		echo "<td><label class = 'checkbox offset2'><input type='checkbox' name='order[]' value = ".$row['id']."></label></td>";
		echo "<td><a href='view_order.php?order_id=$row[id]' class='btn btn-link'>$row[id]</a></td>";
		echo "<td>".$row['shipping_name']."</td>";
		echo "<td>".$row['credit_4']."</td>";
		echo "<td>".$row['quantity']."</td>";
		echo "<td>$".$row['total_amount']."</td>";
		echo "<td>".$row['tracking_num']."</td>";
		echo "<td>".$row['status']."</td>";
		echo "</tr>";
}
//close connection to db
$conn->disconnect();



?>
</tbody>
</table>
	<!--Create submit button-->
<br><button type = "submit"  class = "btn btn-primary">Process Selected Orders</button>
</form>
</div>
</div>
	<!--Include template file-->
	<?php include 'end_template.php'?>
	</body>
</html>