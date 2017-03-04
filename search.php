<?php
		//connect the database
		include 'php/connection.php';
		session_start();

		$searched = $_GET['search'];
		$country_search = $_GET['search_item_country'];


		if (!empty($searched) && !empty($country_search)) {
			# code...
		}else{
			header("location:home.php");
		}
		 //CHECK if the user has selected any country
		 if ($country_search=='Everywhere..') {

		  	$check_results = mysqli_query($db_con,"SELECT * FROM products
				 Where product_name like '%$searched%' 
				 or product_city like '%$searched%'
				 OR product_categorie like '%$searched%'
				 
				 ");
		  		// sr = show results


		  }else{
		  
				$check_results = mysqli_query($db_con,"SELECT * FROM products
				 Where product_name like '%$searched%' 
				 and product_country like '%$country_search%' 
				 OR product_city  like '%$searched%' 
				 OR product_categorie like '%$searched%'

				 ");

		  }

		
?>

<html>
<head>
	<title>Search..</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src='js/jquery.js'></script>
	<script type="text/javascript" src='js/main.js'></script>
	<meta charset='utf-8'>
</head>
<body>
	<?php include 'comp/page_header.php'; ?>
<?php if(isset($_SESSION['id'])){include 'comp/bar_menu.php';} ?>
<div id="search_all_results_container">
	<?php
		if (mysqli_num_rows($check_results)>0) {
				while ($sr=$check_results->fetch_assoc()) {
		  			// Find results
		  			$fr = array(
		  						$sr['id'],
		  						$sr['product_name'],
		  						$sr['product_country'],
		  						$sr['product_city'],
		  						$sr['product_price'],
		  						$sr['product_description'],
		  						$sr['product_thumbnail']
		  				);
		  			$product_views_search = mysqli_query($db_con,"SELECT * FROM views WHERE view_product='$fr[0]' ");
		  			$frprice = number_format($fr[4]);

		  			echo "<a class='search_product_link' href='product.php?product=$fr[0]' target='_blank'><div id='search_single_result_general_container'>
		<h5 style='color:#009688; font-size:20px; font-weight:normal;'>$fr[1]</h5>
		<p  style='margin-left:500px; position:absolute; margin-top:-20px; font-size:15px; background-color:#f44336; padding:5px; border-radius:3px; color:white;'>$frprice $</p>
		<h6 style='margin-left:620px; position:absolute; margin-top:-15px; font-size:15px; color:grey;'>Views : ";?><?php echo mysqli_num_rows($product_views_search); ?><?php echo "</h6>
		<hr id='hr_single_container'>
		<div class='search_single_thumbnail_container'>
			<img class='search_single_thumbnail_container' src='product_thumbnail/$fr[6]'>
		</div><!--search_single_thumbnail_container-->
		<p style='margin-left:10px; margin-top:10px; color:grey;'>$fr[3], $fr[2]</p>
			<p style='width:500px;margin-left:180px; margin-top:-150px; position:absolute;'>$fr[5]</p>
	</div></a><!--search_single_result_general_container-->";
		  	}
		}else{
			echo "<h3 style='color:red; font-weight:normal;'>We dindn't Find Any Result</h3>";
		}
	?>
</div><!--search_all_results_container-->
</body>
</html>