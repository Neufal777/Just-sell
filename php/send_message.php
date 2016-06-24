<?php
	include 'connection.php';
	// smi = send message information
	$smi = array(
				mysqli_real_escape_string($db_con,$_GET['product_id']),
				mysqli_real_escape_string($db_con,$_GET['product_name']),
				mysqli_real_escape_string($db_con,$_GET['product_seller']),
				mysqli_real_escape_string($db_con,$_GET['message_author']),
				mysqli_real_escape_string($db_con,htmlentities(@$_GET['message_author_contact_information'])),
				mysqli_real_escape_string($db_con,htmlentities(@$_GET['message_message'])),
				mysqli_real_escape_string($db_con,htmlentities(@$_GET['message_date']))


		);


		if (!empty($smi[3]) && !empty($smi[4]) && !empty($smi[5])) {
				
				mysqli_query($db_con,"INSERT INTO messages(
															product_name,
															message_author,
															seller,
															message_date,
															message_author_contact,
															message_status,
															product_id,
															message_content
															) values (
																'$smi[1]',
																'$smi[3]',
																'$smi[2]',
																'$smi[6]',
																'$smi[4]',
																'sent',
																'$smi[0]',
																'$smi[5]')") or die(mysqli_error($db_con)) ;
				echo "Message Sent Successfully";
		}else{
			echo "Please Fill all the inputs";
		}
?>


