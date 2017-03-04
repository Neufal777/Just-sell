<?php
	
	include 'connection.php';
	// ri = register information
	$ri = array(
				mysqli_real_escape_string($db_con,$_POST['register_name']),
				mysqli_real_escape_string($db_con,$_POST['register_username']),
				mysqli_real_escape_string($db_con,$_POST['register_email']),
				md5($_POST['register_password']),
				md5($_POST['register_password_confirm'])
		);

	$register_date = date('d/M/Y');

	if (!empty($ri[0]) && !empty($ri[1]) && !empty($ri[2]) && !empty($ri[3]) && !empty($ri[4])) {
		// Check If Password and confirm password is the same
		if ($ri[3]==$ri[4]) {
			// check if username and email alredy exist
			$check_username_avaiable = mysqli_query($db_con,"SELECT * FROM users WHERE username='$ri[1]' ");
			$check_email_avaiable 	 = mysqli_query($db_con,"SELECT * FROM users WHERE email = '$ri[2]' ");

			if (mysqli_num_rows($check_username_avaiable)>0) {
				
				echo "This Username Alredy Exists";

			}else{

				if (mysqli_num_rows($check_email_avaiable)>0) {
					echo "This Email Alredy Exist";
				}else{
					mysqli_query($db_con,"INSERT INTO users(name,username,email,password,register_date,status) values(

									'$ri[0]',
									'$ri[1]',
									'$ri[2]',
									'$ri[3]',
									'$register_date',
									'offline'
							)");

							// REGISTRATION COMPLETE
							echo "Registred Correctly";
				}
			}

		}else{
			echo "Please Confirm Your Password";
		}

	}else{
		echo "Please FIll All The Inputs";
	}
?>