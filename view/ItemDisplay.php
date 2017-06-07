<?php

/* Corey Deising
	
	ItemDisplay.php
	
	This page allows the end user to view every item available in the database currently.
	We make the assumption that every item is currently in stock since we do not need keep track of in stock quantity at this time.
	
*/

include '../Model/Database.php';
include 'header.php';

?>
	<section>
	<center>
	
	<h2>Our current selection of in stock items:</h2>
	
	 <?php 
		  foreach ($prodDetails as $prodDetail) { 
		    
		  
		  ?>
			
			<section> 
			
			<center>
			
				<h3 class="product_name"><?php echo $prodDetail['Name']; ?></h3>
				<?php echo "<p><u>Product ID: " . $prodDetail['ProductID']. "</u></p>";?>
				<?php echo "<p class='product_price'>Price: $" . $prodDetail['Price'] . "</p>";?>
				<?php echo "<IMG class='product_image' src='" . $prodDetail['ImagePath'] ."' width='400' height='400'>" ; ?>
				<?php echo "<p class='product_description'>" . $prodDetail['Description'] . "</p>";?>
				<?php echo "<a class='product_add_item' href=SelectItem.php?ProductID=" . $prodDetail['ProductID'] . ">View Item Details</a>"; ?>
				
				
			
				</center>
			</section>
		  
		  <?php } ?>
	
<?php include 'footer.php';?>
 