<?php

/* Corey Deising
	
	SelectItem.php
	
	This file is used after a specific product has been "selected" for further viewing.
	The user can go back, or enter a quantity and add this item to their cart based on that quantity.
	
*/
$prodID = $_GET['ProductID'];
include '../Model/SpecificDatabase.php';
include 'Header.php';

?>
	
	<section> 
			
			<center>
			
				<h2>You're About to Add The Following Item to Your Cart:</h2>
			
				<h3 class="product_name"><?php echo $prodName; ?></h3>
				<?php echo "<p><u>Product ID: " . $prodID. "</u></p>";?>
				<?php echo "<p class='product_price'>Price: $" . $prodPrice. "</p>";?>
				<?php echo "<IMG class='product_image' src='" . $prodImagePath . "' width='400' height='400'>" ; ?>
				<?php echo "<p class='product_description'>" . $prodDescription . "</p>";?>
				
				<form Method="get" ID="addCartForm" action="ViewCart.php">
				Quantity: <input type="number" id='txtQuantity' name="prodQuantity" class ="txtProdQuantity"><br>
				<input type="submit" value="Add to Cart">
				<input type="hidden" name="prodID" value=<?php echo "'" . $prodID . "'"; ?>>
				<input type="hidden" name="action" value="add">
				</form>
				<input id="AddCartCancel" type="button" name="cancelButton" value="Cancel" onclick="location.href='ItemDisplay.php';" />
				
				</center>
			</section>
		  
<?php include 'Footer.php'; ?>