<?php
	session_start();
	include 'connection.php';
	$product_seller = $_SESSION['username'];
	$product_publish_date = date('d/M/Y');

	// GENEARTE A RANDOM STRING TO RENAME THE IMAGES
						$characters = 'abcdefghijklmnopqrstuvyz0123456789';
						$rand_string = str_shuffle($characters);

	// p_inf = PRODUCT INFORMATION
	$p_inf = array(
					mysqli_real_escape_string($db_con,$_POST['item_name']),
					mysqli_real_escape_string($db_con,$_POST['item_categorie']),
					mysqli_real_escape_string($db_con,$_POST['item_phone_number']),
					mysqli_real_escape_string($db_con,$_POST['item_status']),
					mysqli_real_escape_string($db_con,$_POST['item_country']),
					mysqli_real_escape_string($db_con,$_POST['item_city']),
					mysqli_real_escape_string($db_con,$_POST['item_price']),
					mysqli_real_escape_string($db_con,$_POST['item_description']),
					$_FILES['item_image_one']['name'],
					$_FILES['item_image_two']['name'],
					$_FILES['item_image_three']['name']

		);

		// Extension of the image one
		$exp_image_one = explode('.', $_FILES['item_image_one']['name']);
		$ext_image_one = strtolower(end($exp_image_one));
		// Extension of the image two
		$exp_image_two = explode('.', $_FILES['item_image_two']['name']);
		$ext_image_two = strtolower(end($exp_image_two));
		// Extension of the image two
		$exp_image_three = explode('.', $_FILES['item_image_three']['name']);
		$ext_image_three = strtolower(end($exp_image_three));
		// FINAL NAMES FOR THE UPLOADED IMAGES
		$final_image_one_name = 'thumbnail'.$product_seller.$rand_string.$_FILES['item_image_one']['name'];
		$final_image_two_name = 'imagetwo'.$product_seller.$rand_string.$_FILES['item_image_two']['name'];
		$final_image_three_name = 'imagethree'.$product_seller.$rand_string.$_FILES['item_image_three']['name'];

// Check If the inputs are empty

if (!empty($p_inf[0]) &&  !empty($p_inf[1]) &&  !empty($p_inf[2]) &&  !empty($p_inf[3]) &&  !empty($p_inf[4]) &&  !empty($p_inf[5]) && !empty($p_inf[6]) && !empty($p_inf[7])&& !empty($p_inf[8]) && !empty($p_inf[9]) && !empty($p_inf[10])) {
			
			// Check The Extension Of the image one

			if ($ext_image_one == 'jpg' || $ext_image_one=='png' ) {
					
				// Check the extension of the image two

				if ($ext_image_two=='jpg' || $ext_image_two=='png') {
					
					// Check the extension of the image three

					if ($ext_image_three == 'jpg' || $ext_image_three == 'png' ) {


						// INTRODUCE THE INFORMATION IN THE DATABASE

						mysqli_query($db_con,"INSERT INTO products(
																	product_seller,
																	product_name,
																	product_categorie,
																	product_phone_number,
																	product_status,
																	product_country,
																	product_city,
																	product_price,
																	product_description,
																	product_publish_date,
																	product_thumbnail

							) values(
										'$product_seller',
										'$p_inf[0]',
										'$p_inf[1]',
										'$p_inf[2]',
										'$p_inf[3]',
										'$p_inf[4]',
										'$p_inf[5]',
										'$p_inf[6]',
										'$p_inf[7]',
										'$product_publish_date',
										'$final_image_one_name'
										) ");

						// INSERT THE NAMES OF THE IMAGES TO A product_images TABLE IN THE DATABASE

						mysqli_query($db_con,"INSERT INTO products_images(seller,upload_date,product_name,image_name) values('$product_seller','$product_publish_date','$p_inf[0]','$final_image_two_name')");
						mysqli_query($db_con,"INSERT INTO products_images(seller,upload_date,product_name,image_name) values('$product_seller','$product_publish_date','$p_inf[0]','$final_image_three_name')");
						
						// MOVE THE THUMBNAIL FILE To the thumbnail folder

						move_uploaded_file($_FILES['item_image_one']['tmp_name'], '../product_thumbnail/'.$final_image_one_name);
						// Move the other 2 images to a folder
						move_uploaded_file($_FILES['item_image_two']['tmp_name'], '../product_images/'.$final_image_two_name);
						move_uploaded_file($_FILES['item_image_three']['tmp_name'], '../product_images/'.$final_image_three_name);
						echo "Uploaded Succesfully";
					}else{
						echo "Incorrect Image Extension In the image three";
					}

				}else{
					echo "Icorrect Image Extension In the image 2";
				}

			}else{
				echo "Icorrect Image Extension In the image 1";
			}
}else{
	echo "Please Fill All The Inputs";
}

?>