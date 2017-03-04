<?php
	
	include 'connection.php';
	// LOGIN INPUT INFORMATION
	$li = array(
				mysqli_real_escape_string($db_con,$_POST['login_username']),
				md5($_POST['login_password'])
		);

	if (!empty($li[0]) && !empty($li[1])) {
			
			// CHECK IF THE USER EXISTS
			$check_logged_user = mysqli_query($db_con,"SELECT * FROM users WHERE username='$li[0]' ");

			if (mysqli_num_rows($check_logged_user)>0) {
					
					while ($get_user_data = $check_logged_user->fetch_assoc()) {
								
								// INFORMATION WE GET ABOUT THE LOGGED IN USER
								$gi = array(
									$get_user_data['id'],
									$get_user_data['name'],
									$get_user_data['username'],
									$get_user_data['email'],
									$get_user_data['password'],
									$get_user_data['status']
									);

								if ($li[0]==$gi[2] && $li[1]==$gi[4]) {
									// START A SESSION IF THE USER IS LOGGED IN 
									session_start();

									$_SESSION['id'] = $gi[0];
									$_SESSION['name'] = $gi[1];
									$_SESSION['username'] = $gi[2];
									$_SESSION['email'] = $gi[3];

									// if we log in update the stats to online
									mysqli_query($db_con,"UPDATE users SET status='online' where username='$gi[2]' ");
									// REDIRECT TO THE HOME PAGE
									echo "<script>document.location = 'home.php';</script>";
								}else{
									echo "Incorrect Information";
								}
					}
			}else{
				echo "This User doesn't Exist";
			}
	}else{
		echo "Please Fill All The Inputs";
	}
?>