<?php

/* 
Corey Deising
	
Database.php

This file is used to establish a database connection to query all products in the database.

This will be used to display all of the products on the ItemDisplay page.

Allows the user to browse all of the items.
	
*/
try 
{
$dsn = 'mysql:host=localhost;dbname=finalprojectDB'; 
$username = 'root'; 
$password = ''; 

$db = new PDO($dsn, $username, $password); 

$query = "SELECT * FROM Products ORDER BY Name";

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




?>