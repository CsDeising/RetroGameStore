<?php

/* 
Corey Deising

login_DB.php

This file will be used to add customers to the database.

This file will also be used to validate user login credentials.

This file is accessed both when creating a new user, and when verifying credentials as an existing user.

Based on the action supplied through the GET Method - the user proper function will be called from the Switch Case.

Upon Successful creation or validation of the end user account - we are redirected to OrderReceipt.php to finalize the order under that account.

If validation fails for an existing user, we return them to the Login.php page with an error message.

Lastly, if a new user is created, this file does grab the last created CustomerID to pass along. We are letting the database assign the customer ID from the auto_increment feature of mySQL. As the website traffic increase, this may cause concurrency issues and have to be looked into further.

*/
session_start();

$firstName = $_GET['firstName'];
$lastName = $_GET['lastName'];
$address = $_GET['address'];
$phone = $_GET['phone'];
$email = $_GET['email'];
$password = $_GET['password'];
$action = $_GET['action'];

switch($action)
{
case "new":

add_user($firstName, $lastName, $address, $phone, $email, $password);

break;

case "existing":

is_valid_login($email, $password);

break;

}

function is_valid_login($email, $password)
{
	try 
	{
		$dsn = 'mysql:host=localhost;dbname=finalprojectDB'; 
		$username = 'root'; 
		$DBpassword = ''; 

		$db = new PDO($dsn, $username, $DBpassword); 

		$query = "SELECT CustomerID FROM customer WHERE email = :email AND password = :password";
		$statement = $db->prepare($query);

		$statement ->bindValue(':email', $email);
		$statement ->bindValue(':password', $password);
		
		$statement->execute();
		$custDetails = $statement->fetchAll();
		$valid = ($statement->rowCount() == 1);
		$statement->closeCursor();
		
		
		
		foreach($custDetails as $custDetail)
		{
			$custID = $custDetail['CustomerID'];
		}
		
		if($valid == TRUE )
		{
			
			header( "Location: /View/OrderReceipt.php?custID=$custID");
		}
		else
		{
			
			header( "Location: /View/Login.php?error=error");
		}
		
		

	}
	catch(PDOException $e) 
	{
		$error_message = $e->getMessage();
		echo "<p>An error occurred while connecting to the database: $error_message </p>";
	}
}

function add_user($firstName, $lastName, $address, $phone, $email, $password)
{
	
	try 
	{
		$dsn = 'mysql:host=localhost;dbname=finalprojectDB'; 
		$username = 'root'; 
		$DBpassword = ''; 

		$db = new PDO($dsn, $username, $DBpassword); 

		$query = "INSERT INTO customer (FirstName, LastName, Address, Phone, Email, Password) VALUES (:firstName, :lastName, :address, :phone, :email, :password)";
		$statement = $db->prepare($query);
		
		$statement ->bindValue(':firstName', $firstName);
		$statement ->bindValue(':lastName', $lastName);
		$statement ->bindValue(':address', $address);
		$statement ->bindValue(':phone', $phone);
		$statement ->bindValue(':email', $email);
		$statement ->bindValue(':password', $password);	
		$statement->execute();
		$custID = $db->LastInsertID(); // This is where php will grab the last ID created from mySQL.
		$statement->closeCursor();
		
		header( "Location: /View/OrderReceipt.php?custID=$custID");

	}
	catch(PDOException $e) 
	{
		$error_message = $e->getMessage();
		echo "<p>An error occurred while connecting to the database: $error_message </p>";
	}



}
?>