<?php

/* Corey Deising
	
	OrderReceipt.php
	
	This file is used to show the end-user that their order has been submitted successfully.
	Ultimately, this is the FINAL screen of the check out process.
	This screen should show your order ID number for confirmation and the user ID that the order was created under.
	
	
*/
session_start();
include 'Header.php';
include '../Model/order_db.php';

?>

<section>

	<center>
	
	<h2>Order Receipt</h2>
	<p>To confirm your order - Here is your order number: <?php echo $orderID . "<br>Logged under account ID: ". $custID; ?></p>
	
	
	<p><a href='ItemDisplay.php'>Shop Again</a></p>
	
	</center>

	
</section>



<?php include 'Footer.php'; ?>