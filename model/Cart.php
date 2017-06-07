<?php 
	
/* Corey Deising
	
	
	Cart.php
	
	This is a model file that interacts with the session cart and does the math to calculate cart and manage it.
	
	
*/
	
if (empty($_SESSION['cart']))
{
	unset($_SESSION['cart']);
}

	
	
	if (isset($_GET['action']))
{
	$action = $_GET['action'];
}
else
{
	$action = "empty";
}

$prodID = $_GET["prodID"];
$prodQuantity = $_GET["prodQuantity"];



switch($action)
{
case "add":

	if (isset($_SESSION['cart'][$prodID]))
	{
	$_SESSION['cart'][$prodID]+= $prodQuantity;
	
	}
	else
	{
	$_SESSION['cart'][$prodID] = $prodQuantity;
	}
break;

case "remove":

if (isset($_SESSION['cart'][$prodID]))
	{
	$_SESSION['cart'][$prodID]--;
		if(($_SESSION['cart'][$prodID] == 0))
		{
			unset($_SESSION['cart'][$prodID]);
		}
		if(empty($_SESSION['cart']))
		{
			unset($_SESSION['cart']);
		}
	}
	
break;

case "empty":

unset($_SESSION['cart']);

break;
}

/* Display Cart */

if(isset($_SESSION['cart']))
{
	echo "<table border=0 cellspacing=0 cellpadding=10 width='1100'>";
	
		echo "<tr>";
		echo "<td>Product ID</td>";
		echo "<td>Product Name</td>";
		echo "<td>Product Description</td>";
		echo "<td>Unit Price</td>";
		echo "<td>Quantity</td>";
		echo "<td>Line Total</td>";
		echo "</tr>";
	
	$total = 0;
	$line_cost = 0;
	foreach($_SESSION['cart'] as $prodID => $x)
	{
		$dsn = 'mysql:host=localhost;dbname=finalprojectDB'; 
		$username = 'root'; 
		$password = ''; 

		$db = new PDO($dsn, $username, $password); 
		$query = "SELECT * FROM products WHERE ProductID = $prodID"; 

		$statement = $db->prepare($query);
		$statement->execute();
		$persons = $statement->fetchAll();
		$statement->closeCursor();
		
		
		
				
			foreach($persons as $person)
			{
				$prodName = $person['Name'];
				$prodPrice = $person['Price'];
				$prodDescription = $person['Description'];
			}
			
			$line_cost = $prodPrice * $x;
			$total = $total+$line_cost;
		
	
		echo "<tr>";
		echo "<td>$prodID</td>";
		echo "<td>$prodName</td>";
		echo "<td>$prodDescription</td>";
		echo "<td>$$prodPrice</td>";
		echo "<td>$x <a href=ViewCart.php?prodID=".$prodID."&action=remove><u>X</u></a></td>";
		echo "<td>$$line_cost";
		echo "</tr>";
		
	}
	
	echo "</table>";
echo "<p>Total = <b>$$total</b></p>";
	
}



else
{
	echo "cart is empty";
}

	?>