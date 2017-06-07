<?php

session_start();

include 'header.php';

/* Corey Deising
	
	
	ViewCart.php
	
	This file is used to view the contents of the shopping cart session variable.
	The last section of PHP code is used to only display the elements to continue with check out IF a cart has been created for the end user.
	We do NOT want the customer checking out if nothing is being purchased.
	
*/

?>

<section>

	<center>
	
	<h2>Here are the contents of your cart:</h2>
	
	<?php 
	
	include '../Model/Cart.php';

	?>
	<?php
	if(isset($_SESSION['cart']))
	{
	echo	"<p><a href='CheckOut.php'>Continue with Checkout</a></p>";
	echo	"<p><a href='ItemDisplay.php'>Continue Shopping</a></p>";
	echo	"<p><a href='ViewCart.php/action=empty'>Empty Cart</a></p>";
	}
	else
	{
		    "<p></p>";
	echo	"<p></p>";
	echo	"<p></p>";
	}
	?>
	</center>
	
</section>
		  
	
	
<?php include 'footer.php'; ?>