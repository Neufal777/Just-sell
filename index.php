<?php
	session_start();

	if (isset($_SESSION['id'])) {
		header("location: home.php");
	}
?>
<html>
<head>
	<title>Just Sell</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src='js/jquery.js'></script>
	<script type="text/javascript" src='js/main.js'></script>
</head>
<body>
	<?php include 'comp/page_header.php'; ?> <!--This is The search bar in the top of every page-->
	<div id='index_page_login_register_general_container'>
		<div id='index_page_login_container'>
			<a id='index_login_title'>Login</a>
			<hr id='hr_top_login_div'>
			<form id="login_form">
				<input type='text'  autocomplete="off" name='login_username' placeholder='Username' class='login_inputs'><br>
				<input type='password' autocomplete="off" name='login_password' placeholder='Password' class='login_inputs'>
				<!-- REGISTER BUTTONS -->
				<input onclick='return false' type='submit' Value='Login' id='login_submit'>
				<input type='submit' onclick='return false' Value='Register' id='login_show_register_form'>
			</form>
		</div> <!--index_page_login_container-->

		<!-- REGISTER FORM CONTAINER -->
		<div id='index_page_register_container'>
			<a id='index_register_title'>Register</a>
			<hr id='hr_top_login_div'>
			<form id="register_form"> 
				<h5 class='register_hint'>Name</h5><input type='text' autocomplete="off" 		name='register_name' 							class='register_inputs'><br>
				<h5 class='register_hint'>Username</h5><input type='text' autocomplete="off" 		name='register_username' 					class='register_inputs'>
				<h5 class='register_hint'>Email</h5><input type='text' autocomplete="off" 		name='register_email' 							class='register_inputs'>
				<h5 class='register_hint'>Password</h5><input type='password' 	name='register_password' 					class='register_inputs'>
				<h5 class='register_hint'>Confirm Password</h5><input type='password' 	name='register_password_confirm' 	class='register_inputs'>
				<!-- SUBMIT BUTTONS -->
				<input  onclick='return false' type='submit' Value='Register' id='register_submit'>
				<input type='submit' onclick='return false' Value='Login' id='login_show_login_form'>
			</form>
		</div> <!--index_page_login_container-->
	</div>

			<div id="register_result"></div>
</body>
</html>