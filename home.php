<?php

	session_start();
	if (isset($_SESSION['id'])) {
		include 'php/connection.php';
	}else{
		header("location: index.php");
	}
?>

<html>
<head>
	<title>Home Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php include 'comp/page_header.php'; ?>
<?php include 'comp/bar_menu.php';?>

<div>
	<img src="portada.png" class='home_body_box'>
</div><!--home_body_box-->
</body>
</html>