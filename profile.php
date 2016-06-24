<?php
	ob_start();
	session_start();
	include 'php/connection.php';

	$profile_user = $_GET['username'];
	if (isset($_SESSION['id'])) {
		$logged_user = $_SESSION['username'];
	}

?>


<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src='js/jquery.js'></script>
	<script type="text/javascript" src='js/main.js'></script>
	<meta charset='utf-8'>

</head>
<body>
<?php		 include 'comp/page_header.php';
 ?>
<?php
	if (isset($_SESSION['id'])) {
		include 'comp/bar_menu.php';
	}
?>
<?php
	// SELECT ALL THE DATA OF THE USER FROM THE DATABASE
	$select_profile_data 		= 	mysqli_query($db_con,"SELECT * FROM users WHERE username = '$profile_user'");
	$select_products_of_the_user = 	mysqli_query($db_con,"SELECT * FROM products WHERE product_seller='$profile_user' order by 1 desc ");

	if (mysqli_num_rows($select_profile_data)>0) {
			
			//Get the data
			//pd = profile data 
			while ($pd = $select_profile_data->fetch_assoc()) {
					
					$d = array(
						$pd['name'],
						$pd['username'],
						$pd['email'],
						$pd['register_date'],
						$pd['status']
						);
			}
	}else{
		header("location: home.php");
	}
?>
<!-- GET THE PRODUCTS OF THE USER -->
<div id="profile_user_information_container">
	<a id='profile_information_title_style'><?php echo $d[0]; ?> { <?php echo $d[1]; ?> } Has <?php echo mysqli_num_rows($select_products_of_the_user); ?> Products For Sale</a><br>
</div><!--profile_user_information_container-->
<div id="profile_user_products_general_container">



	

<?php
	if (mysqli_num_rows($select_products_of_the_user)>0) {
			
			// Select the products of the profile's use
		// prod = productss
			while ($prod = $select_products_of_the_user->fetch_assoc()) {
					
					// pin = produts information
					$pin = array($prod['product_name'],$prod['product_price'],$prod['product_thumbnail'],$prod['id']);
					$price = number_format($pin[1]);
					echo "<a href='product.php?product=$pin[3]'><div class='$pin[3]' id='profile_single_product_general_container'>
								<div id='single_product_thumbnail_container'><img src='product_thumbnail/$pin[2]' class='profile_thumbnail_image'></div></a>
							<div id='single_product_information_container'>
								<h5 id='single_product_name'> $pin[0]</h5><br>
								<h5 id='single_product_price' style='color:#FF5722;'>$price$</h5>
							</div>";?><?php 
										// If the profile is the same as session username, Allow to delete the products

										if (isset($_SESSION['id'])) {
											if ($d[1]==$logged_user) {
											echo "<a id='delete_post_text'  href='delete.php?post_to_delete_id=$pin[3]'><div>Delete</div></a>";
										}else{

										}
										}
							 ?><?php echo"
	</div>
		";
			}
	}else{
		echo "<h3 style='font-weight:normal;color:white;'>This User Has No Products Yet</h3>";
	}
?>







	

</div><!--profile_user_products_general_container-->
</body>
</html>