<?php

/* Corey Deising

	Login.php
	
	The user sees this screen if they are checking out as an EXISTING user.
	The HTML below contains a form asking for an E-mail and Password to verify login.
	
*/

session_start();
include 'Header.php';

$error = $_GET['error'];

if ($error == 'error')
{
	$error_message = "Incorrect credentials. Please try again.";
}
else
{
	$error_message = "";
}

?>

<script>



</script>

<section>

	<center>
	
	<h2>Welcome Back Existing User</h2>
	<p>To Finalize your order - Please enter your current account information</p>
	<p>Please note - This will also complete your order using your already existing account.</p>
	
	<p><?php echo $error_message; ?></p>
	
	<form Method="get" ID="NewUserForm" action="../Model/login_DB.php">
  Email: <input type="text" name="email"><br>
  Password: <input type="password" name="password"><br>
  <input type="submit" value="Login">
  <input type="hidden" name="action" value="existing">
	
	</center>

	
</section>



<?php include 'Footer.php'; ?>