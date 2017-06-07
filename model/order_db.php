<?php


/* 
Corey Deising

order_db.php
	
This file is loaded with the OrderReceipt.php file. The user never interacts with this file directly.
This file will go through all of the items in the shopping cart session variable one last time, then insert them into database.
Upon inserting the items into database, the session cart variable will be emptied and then unset.
Lastly, this page is responsible for generating an OrderID number which is associated with all of the items from this particular order.
For project purposes, it is generating a random number between 1 - 50000. In a real-world scenario, we'd want to connect to database and make sure the number isn't currently assigned, or have the database assign the number for us.
	
*/


session_start();

$custID = $_GET['custID'];

$orderID = rand(1, 50000);

	try 
	{
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
		
			foreach($persons as $person)
			{
				$prodID = $person['ProductID'];
				
				$prodName = $person['Name'];
				
				$prodPrice = $person['Price'];
				
				$prodDescription = $person['Description'];
				
			}
			$line_cost = $prodPrice * $x;
		
			// -----------------------------------------------------------
			
			$query = "INSERT INTO orderdetails (OrderID, CustomerID, ProductID, ProductName, ProductPrice, ProductDescription, ProductQuantity, ProductLineTotal) VALUES (:OrderID, :CustomerID, :ProductID, :ProductName, :ProductPrice, :ProductDescription, :ProductQuantity, :ProductLineTotal)";
			
			$statement = $db->prepare($query);
			$statement ->bindValue(':OrderID', $orderID);
			$statement ->bindValue(':CustomerID', $custID);
			$statement ->bindValue(':ProductID', $prodID);
			$statement ->bindValue(':ProductName', $prodName);
			$statement ->bindValue(':ProductPrice', $prodPrice);
			$statement ->bindValue(':ProductDescription', $prodDescription);
			$statement ->bindValue(':ProductQuantity', $x);
			$statement ->bindValue(':ProductLineTotal', $line_cost);
			
			$statement->execute();
			$statement->closeCursor();
			
			empty($_SESSION['cart']);
			unset($_SESSION['cart']);

	}	
	}
	catch(PDOException $e) 
	{
		$error_message = $e->getMessage();
		echo "<p>An error occurred while connecting to the database: $error_message </p>";
	}



?>