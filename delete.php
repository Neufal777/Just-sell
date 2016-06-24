<?php
	
	session_start();
	include 'php/connection.php';

	$to_delete = $_GET['post_to_delete_id'];
	$active = $_SESSION['username'];

	$check_product = mysqli_query($db_con,"SELECT * FROM products WHERE id='$to_delete' and product_seller='$active' ");


	if (mysqli_num_rows($check_product)>0) {
			
			// DELETE THE PRODUCT FROM THE DATABASE
			mysqli_query($db_con,"DELETE FROM products WHERE id='$to_delete' and product_seller='$active' ");
			header("location:profile.php?username=$active");
	}
?>