<?php
	session_start();
	include 'connection.php';

	$active_user = $_SESSION['username']; //current connected user [username]

	mysqli_query($db_con, "UPDATE users SET status='offline' where username='$active_user'"); //set the user Offline

	session_destroy(); //destroy the session

	header("location: ../index.php"); //redirect the user to the Index page
?>