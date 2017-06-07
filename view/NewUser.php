<?php

/* Corey Deising
	
	NewUser.php
	
	This file is viewed upon checking out as a NEW user.
	The form below will allow users to create an account and immediately submit their order to the database.
	The OrderReceipt.php tab which is to follow - should contain the new Customer ID that was created in MySQL.
	
*/

session_start();
include 'Header.php';

?>

<section>

	<center>
	
	<h2>Welcome New User</h2>
	<p>To Finalize your order - Please enter your information to create an account.</p>
	<p>Please note - This will also complete your order using your newly created account.</p>
	
	<form Method="get" ID="NewUserForm" action="/Model/login_DB.php">
  First Name: <input required type="text" name="firstName" required><br>
  Last Name: <input type="text" name="lastName" required><br>
  Address: <input type="text" name="address" required><br>
  Phone: <input type="text" name="phone" required><br>
  Email: <input type="text" name="email" required><br>
  Password: <input type="text" name="password" required><br>
  <input type="submit" value="Create Account">
  <input type="hidden" name="action" value="new">
	
	</center>

	
</section>



<?php include 'Footer.php'; ?>