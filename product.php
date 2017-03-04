<?php

   //starting a session
   session_start();

   //including the file that allows us to connect with the database
   include 'php/connection.php';

   //Get method to get the product that the user is looking for
   $searched_product = $_GET['product'];
   $select_product_from_database = mysqli_query($db_con,"SELECT * FROM products WHERE id='$searched_product' ");
   $date = date('d/m/Y');
   
   if (mysqli_num_rows($select_product_from_database)>0) {
   		
   		// GETTING THE DATA
   	// product all information
   
   		while ($proinf= $select_product_from_database->fetch_assoc()) {
   					// pinf = product information
   					$pinf = array(
   						$proinf['product_name'],
   						$proinf['id'],
   						$proinf['product_seller'],
   						$proinf['product_description'],
   						$proinf['product_categorie'],
   						$proinf['product_phone_number'],
   						$proinf['product_status'],
   						$proinf['product_country'],
   						$proinf['product_city'],
   						number_format($proinf['product_price']),
   						$proinf['product_publish_date'],
   						$proinf['product_thumbnail']
   						);
   
   		}
   		mysqli_query($db_con,"INSERT INTO views(view_product) values('$pinf[1]')");
   		$select_product_views = mysqli_query($db_con,"SELECT * FROM views WHERE view_product='$pinf[1]' ");
   }else{

      //Redirect to the home page
   	header("location: home.php");
   }
   ?>
<html>
   <head>
      <title>Product</title>
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <script type="text/javascript" src='js/jquery.js'></script>
      <script type="text/javascript" src='js/main.js'></script>
      <meta charset='utf-8'>
   </head>
   <body>
      <?php include 'comp/page_header.php'; ?>
      <?php if(isset($_SESSION['id'])){include 'comp/bar_menu.php';}?>
      <div id="product_page_information_right_container">
         <h4 style='font-family:arial; color:#3E464C; font-size:15px;'><?php echo $pinf[0];; ?></h4>
         <hr style='margin-top:10px;border-top: 1px solid #EEEEE; margin-bottom:10px;'>
         <label>⛹ Seller </label>
         <a target='_blank' href='profile.php?username=<?php echo $pinf[2]; ?>'>
            <h4 class='product_page_information_h4'> <?php echo $pinf[2]; ?></h4>
            <br>
         </a>
         <label>⚡ Categorie </label>
         <h4 class='product_page_information_h4'> <?php echo $pinf[4]; ?></h4>
         <br>
         <label>☏ Phone </label>
         <h4 class='product_page_information_h4'> <?php echo $pinf[5]; ?></h4>
         <br>
         <label>⚠ Status </label>
         <h4 class='product_page_information_h4'> <?php echo $pinf[6]; ?></h4>
         <br>
         <label>🗺 Country </label>
         <h4 class='product_page_information_h4'> <?php echo $pinf[7]; ?></h4>
         <br>
         <label>⛗ City </label>
         <h4 class='product_page_information_h4'><?php echo $pinf[8]; ?></h4>
         <br>
         <label>💰 Price </label>
         <h4 class='product_page_information_h4'> <?php echo $pinf[9].'$'; ?>	</h4>
         <br>
         <label>☀ Publish Date </label>
         <h4 class='product_page_information_h4'> <?php echo $pinf[10] ?></h4>
         <br>
         <label>❝ ❞ Description ▼</label>
         <div id="product_page_information_description_container">
            <p style='padding:10px; color:grey;'><?php echo $pinf[3]; ?></p>
         </div>
         <div id="product_views_count_container">
            <h2 style='padding:6px; font-size:13px; font-weight:normal;'><?php echo mysqli_num_rows($select_product_views); ?>	👁 Views</h2>
         </div>
         <!--product_views_cout_container-->
         <div id='product_send_message'>
            <form id='send_message_form'  >
               <input type="hidden" name="product_id" value="<?php echo $pinf[1];?>" /><!--Product id-->
               <input type="hidden" name="product_name" value="<?php echo $pinf[0];?>" /><!--product name-->
               <input type="hidden" name="product_seller" value="<?php echo $pinf[2];?>" /><!--product seller-->
               <input type="hidden" name="message_date" value="<?php echo $date;?>" /><!--product seller-->
               <input spellcheck='false' class='send_message_inputs' id='send_message_from' name='message_author' placeholder='Your Name'>
               <input spellcheck='false' class='send_message_inputs' id='send_message_contact_author' name='message_author_contact_information' placeholder='Your Email Or Phone Number..'>
               <textarea name='message_message' id='send_message_textarea' spellcheck='false' placeholder="Hello <?php echo $pinf[2]; ?> I'm interested in your product..."></textarea>
               <input id='send_message_but' type='submit' value='send To <?php echo $pinf[2]; ?>' >
               <div id="send_message_result"></div>
            </form>
         </div>
         <!--product_send_message-->
      </div>
      <!--produt_page_information_right_container-->
      <div id="product_general_container">
         <a target='_blank'  href='<?php echo 'product_thumbnail/'.$pinf[11]; ?>'><img class='product_page_images_size' src="<?php echo 'product_thumbnail/'.$pinf[11]; ?>"></a>
         <?php
            // Display the image one and two
            $select_images_product_from_database = mysqli_query($db_con,"SELECT * FROM products_images where seller='$pinf[2]' and product_name='$pinf[0]' ");
            
            while ($proimg=$select_images_product_from_database->fetch_assoc()) {
            		
            		$proimages = array($proimg['image_name']);
            		echo "<a target='_blank' href='product_images/$proimages[0]'><img class='product_page_images_size' src='product_images/$proimages[0]'></a>";
            }
            ?>
      </div>
      <!--product_general_container-->
   </body>
</html>
