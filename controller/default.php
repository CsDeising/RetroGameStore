<?php
/* Corey Deising
	
	This page is the landing point for the end-user.
	Allows them to read about the company and begin shopping.
	Or they can use the navigation bar along the top of the website to continue further.
	
	** DB name = finalprojectdb
	** Table(s) = customer, orderdetails, products
	** DB connection - Username = root password = ''
	
*/

include '../view/header.php';

?>

	
	<h2 id="aboutUsHeader">About us:</h2>
	
	<p class="aboutUs">We are a video game retail store that specializes in selling both new and used games, consoles, and accessories. Owned and operated out of Oshkosh Wisconsin, our mission is to be the one stop shop for all video game needs.</p>
	
	<p class="aboutUs">Please be mindful that some used merchandise, especially merchandise that is pre-owned, may not come with all of original parts or packaging. This is includes but is not limited to boxes, instruction manuals, and required console accessories.</p>
	
	<p class="aboutUs">All merchandise rather it is brand new or gently used, they are all guaranteed to work or your money back within 30 days.</p>
	
	<center>
	
	<p class="aboutUs"><a href='../View/ItemDisplay.php'>Begin Shopping</a></p>
	
	</center>
	
<?php include '../view/footer.php'; ?>