<?php

session_start();
include 'Header.php';

/* Corey Deising
	
	CheckOut.php
	
	This file will be used to show the end-user the final version of their shopping cart.
	Normally this file would include tax and shipping charges if they applied.
	Most of this information is the same as what the ViewCart screen includes.
	From this screen - you can return backwards, or continue checking out as a new or existing user.
	
*/

?>

<section>

	<center>
	
	<h2>Check Out!</h2>
	<p>Based on your shopping cart - Here are the items you're purchasing today:</p>
	
	<?php
	
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
		echo "<td>$x</td>";
		echo "<td>$$line_cost";
		echo "</tr>";
		
	}
	
	echo "</table>";
echo "<p>Total = <b>$$total</b></p>";
	
}
	?>
	
	<p><a href='NewUser.php'>Check Out - New Customer</a></p>
	<p><a href='Login.php'>Check Out - Existing Customer</a>
	<p><a href='ViewCart.php?action=view'>Back to Cart</a>
	
	</center>

	
</section>



<?php include 'Footer.php'; ?>