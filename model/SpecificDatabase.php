<?php

/* 
Corey Deising

SpecificDatabase.php

This file is used to establish a database connection to query the selected product in the database.

This will be used to display the selected product on the SelectItem.php page.

Allows the end user to view more detailed information on a specific product.
	
*/


try 
{
$dsn = 'mysql:host=localhost;dbname=finalprojectDB'; 
$username = 'root'; 
$password = ''; 

$db = new PDO($dsn, $username, $password); 

$query = "SELECT * FROM Products WHERE ProductID = $prodID";

$statement = $db->prepare($query);
$statement->execute();
$prodDetails = $statement->fetchAll();
$statement->closeCursor();

}
catch(PDOException $e) 
{
	$error_message = $e->getMessage();
	echo "<p>An error occurred while connecting to the database: $error_message </p>";
}

foreach($prodDetails as $prodDetail)
{
	 $prodName = $prodDetail['Name'];
	 $prodDescription = $prodDetail['Description'];
	 $prodPrice = $prodDetail['Price'];
	 $prodImagePath = $prodDetail['ImagePath'];
}

?>