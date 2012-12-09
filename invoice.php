<?php include "session.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Front Page</title>

    <!--Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 15px;
        padding-bottom: 20px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    
    <!-- Icons -->
    <link rel="shortcut icon" href="http://twitter.github.com/bootstrap/assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-57-precomposed.png">
  </head>


  <body>
    <!--Start of Center Section-->
    <div id="center-section">

        <!--Start of Navigation Bar-->
        <div class="navbar navbar-inverse ">
            <div class="navbar-inner">
                <div class="container-nav">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <!--Links to Account Login and Cart-->
                    <div class="nav-collapse collapse">
                        <p class="navbar-text pull-right">
                        <ul class="nav pull-right">
			    <?php include './models/Account.php';
				$db = new DatabaseLink();
				$a = Account::dbGet($_SESSION['accountId'], $db);
				if ($a == false) {
					echo("<a class=\"brand\" href=\"login.php\">Login/Create Account</a>");
				} else {
					echo("<a class=\"brand\" href=\"accountmgr.php\">Hello, " . $a->fields['first_name'] . "!</a>");
				}
			    ?>	
                            <a class="brand" href="mycart.php">My Cart</a>
                        </ul>
                        </p>
                    </div>
                    <!--Search Bar-->
                    <form class="form-search" action="search.php" method="post" name="Search">
                        <div style="text-align:left">
                            <input type="text" name="fsearch" maxlength="100" class="span6  input-large search-query">
                            <button type="submit" class="btn">Search</button>
                        </div>
                    </form><!--End of Search Bar-->
                </div>
            </div>
        </div><!--End of Navigation Bar-->

        <!--Start of the Center Section below the Navigation Bar-->
        <div class="container-center">
            <div class="row-fluid">
                <!--Logo Here-->
                <a class="brand" href="index.php"> <img src="assets/img/logo.png"></a>
            </div>
        
            <!--Start of Sidebar-->
            <div class="row-fluid">
                <div class="span3">
                    <div class="well sidebar-nav">
                        <ul class="nav nav-list">
                            <li class="nav-header">Product Categories</li>
                            <?php include 'sidebar.php';?>
                        </ul>
                    </div><!--End of Sidebar-->
                </div><!--Span-->
        
                <!--Start of Main Section-->
                <div class="span9">
                    <div class="container-main">
			<?php

			$order_id = $_GET['order_id'];

			include_once './models/Model.php';

			$conn = new DatabaseLink();

			$row = Model::dbGetAllInList("client_orders", "id", array($order_id), $conn);
			$order = mysql_fetch_assoc($row);

			?>

			<div class = 'row'><div class = 'span8'>
			<h4>Invoice</h4>
			<table class = 'table table-bordered'>
			<?php
				
				echo "<tr><td><strong>Order # :</strong></td><td> $order[id] </td></tr>";
				echo "<tr><td><strong>Status  :</strong></td><td> $order[status] </td></tr>";
				echo "</table>";
				$product_details = Model::dbGetAllInList("order_items_details", "order_id", array($order_id), $conn);
				
				while($row = mysql_fetch_assoc($product_details)){
					echo "<table class = 'table table-bordered'>";
					echo "<tr><td><strong>Product Name :</strong></td><td>$row[name]</td>";
					echo "<tr><td><strong>Quantity :</strong></td><td>$row[quantity]</td></tr>";
					echo "<tr><td><strong>Price Per Item :</strong></td><td>$row[price]</td></tr>";
					echo "</table>";
				} 
				
				echo "<table class = 'table table-bordered'>";
				echo "<tr><td><strong>Quantity :</strong></td><td>$order[quantity]</td></tr>";
				echo "<tr><td><strong>Subtotal  :</strong></td><td>$ $order[subtotal] </td></tr>";
				echo "<tr><td><strong>Shipping Price  :</strong></td><td>$ $order[shipping_price] </td></tr>";
				echo "<tr><td><strong>Total  :</strong></td><td>$ $order[total_amount] </td></tr>";
				echo "<tr><td><strong>Ship To : </strong></td><td> $order[shipping_name]</td></tr>";
				echo "<tr><td><strong>Tracking # :</strong> </td><td> $order[tracking_num] </td></tr>";
				echo "<tr><td><strong>Shipping Address :</strong> </td><td> $order[shipping_address] </td></tr>";
				echo "<tr><td><strong>Shipping City :</strong> </td><td> $order[shipping_city] </td></tr>";
				echo "<tr><td><strong>Shipping State :</strong> </td><td> $order[shipping_state] </td></tr>";
				echo "<tr><td><strong>Shipping Zip:</strong> </td><td> $order[shipping_zip] </td></tr>";
				echo "</table></td></tr>";
				
			?>

			</div>
			</div>

			<?php
			$conn->disconnect();
			?>
		
			<!--
			<?php include_once './models/Model.php';
			$row = Model::dbGetAllInList("orders", "id", array($id), $conn);
			$order = mysql_fetch_assoc($row);

			echo("<font size = 5><u><b>Invoice</u/b><br><br></font>");

			echo("Stored Address: <br>");
			
			$query = ("SELECT shipping_name, shipping_address, shipping_city, shipping_zip, phone, billing_address, billing_city, billing_zip, billing_state, shipping_state FROM `orders` WHERE id =" . $curU );
			$result = mysql_query($query, $con) or die("Could not execute query '$query'");
			$row = mysql_fetch_array($result);

			echo("<b>" . $row[0] . " " . $row[1] . ", " . $row[2] . ", " . $row[3] . ", " . $row[10] . ", " . $row[4]. ", " . $row[5] . "<b><br>" );


			echo("<form method = \"post\" action =\"useAddress.php\"><input type=\"submit\" value=\"Use this address\"></form><br><br>");


			echo("<font size = 3><b>Order</b><br><br></font>");

			$cart = array();
			$quanities = array();
			$size = 0;
			$total =0;

			$query = ("SELECT product_id FROM `order_products` WHERE order_id =  '$order_id'");
			$result = mysql_query($query, $con) or die("Could not execute query '$query'");
			
			while($row = mysql_fetch_array($result))
			{
				$cart[$size] = $row[0];
				$size++;
			}
			
			//echo("Your order number is : " . $order_id . "<br><br>");	

			if($size == 0)
			{
				echo("Cart Is Empty");
			}
			else
			{
				for($i = 0; $i < $size; $i++)
				{
					$query = ("SELECT amount FROM `order_products` WHERE order_id = " . $order_id);
					$result = mysql_query($query, $con) or die("Could not execute query '$query'");
					$row = mysql_fetch_array($result);

					$quanity = $row[0];

					$query = ("SELECT name, price, inventory FROM `products` WHERE id=" . $cart[$i] );
					$result = mysql_query($query, $con) or die("Could not execute query '$query'");
					$row = mysql_fetch_array($result);
					
					$name = $row[0];
					$price = $row[1];
					$quanityLeft = $row[2];				


					echo("
					<fieldset>
						     
					<label>$name<br>");

					echo("Price: $" . $price . " <br>");

					$quanities[$i] = "Quanity: " . $quanity;
					echo($quanities[$i]);
					$total = $total + $quanity * $price;
	
					echo("</fieldset><hr><br>");
				}
			}

			if($total > 0)
			{
				$tax = round($total * .06, 2);

				echo("Subtotal: $" . $total ."<br>");
				echo("Shipping and Handling: $" . $order['shipping'] . "<br>");

				echo("Tax: $" .  $tax . "<br>");
				$total = $total + $tax + $order['shipping'];
				echo("Total: " . $total . "<br><br>");
		
			}
			?> -->
                    </div><!--End of Main Section-->
                </div><!--Span-->
            </div><!--End of row containing sidebar and main section-->

      <hr><!--Breakline before Footer-->
      <!--Footer-->
      <footer>
        <p><a href="contact.php">Contact Us</a></p>
      </footer>

        </div><!--End of the Center Section below the Navigation Bar-->
    </div><!--End of Center Section-->
    

    <!-- Javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery-1.8.2.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

</body></html>
