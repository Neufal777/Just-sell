<?php
	session_start();
	include 'connection.php';

	$active_user = $_SESSION['username'];
	mysqli_query($db_con, "UPDATE users SET status='offline' where username='$active_user'");
	session_destroy();
	header("location: ../index.php");
?>